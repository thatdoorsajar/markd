<?php

namespace App\Jobs;

use DOMXPath;
use DOMDocument;
use App\Markd\Folder;
use GuzzleHttp\Client;
use App\Markd\Bookmark;
use Illuminate\Foundation\Bus\Dispatchable;

/**
 * Based on code from mobiosolutions/metatags.
 */
class ProcessBookmarkUrl
{
    use Dispatchable;

    const META_QUERY = '//head/meta';
    const TITLE_QUERY = '/<title[^>]*>(.*?)<\/title>/ims';

    protected $bookmarkUrl;
    protected $parentFolderId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $bookmarkUrl, string $parentFolderId)
    {
        $this->bookmarkUrl = $bookmarkUrl;
        $this->parentFolderId = $parentFolderId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {        
        list($bmTags, $bmTitle) = $this->htmlTagsAndTitle();

        // dd($bmTags);

        $bookmark = $this->firstOrCreateBm($bmTags, $bmTitle);

        return $this->putInFolder($bookmark);
    }

    protected function getHtmlFromUrl()
    {
        return (new Client())->request('GET', $this->bookmarkUrl)
                             ->getBody()
                             ->getContents();
    }

    protected function htmlTagsAndTitle()
    {
        $bmHtml = file_get_contents($this->bookmarkUrl);

        $doc = new DomDocument();
        @$doc->loadHTML($bmHtml);

        $xpath = new DOMXPath($doc);
        $metas = $xpath->query(self::META_QUERY);

        $bmTags = [];
    
        foreach ($metas as $meta) {
            $key = $meta->getAttribute('name');
            $value = $meta->getAttribute('value'); 
    
            if (empty($key)) {
                $key = $meta->getAttribute('property');
            }
    
            if (empty($key)) {
                $key = $meta->getAttribute('itemprop');
            }
    
            if (!empty($key)) {
                if (empty($value)) {
                    $value = $meta->getAttribute('content');
                }

                $bmTags[$key] = $value;
            }
        }

        $bmTitle = preg_match(self::TITLE_QUERY, $bmHtml, $matches) ? $matches[1] : NULL;
    
        return [$bmTags, $bmTitle];
    }

    protected function firstOrCreateBm($tags, $title)
    {
        return Bookmark::create([
            'url_given'    => array_get($tags, 'og:url', $this->bookmarkUrl),
            'url_resolved' => array_get($tags, 'og:url', $this->bookmarkUrl),
            'title'        => array_get($tags, 'og:title', $title),
            'description'  => array_get($tags, 'og:description', NULL),
            'image_url'    => array_get($tags, 'og:image', NULL),
        ]);
    }

    protected function putInFolder($bookmark)
    {
        $folder = Folder::find($this->parentFolderId);
        $bookmark->folder_id = $folder->id;
        $bookmark->user_id = $folder->user_id;
        $bookmark->save();
    }
}
