<a href="https://www.patreon.com/stefansarya"><img src="http://anisics.stream/assets/img/support-badge.png" height="20"></a>
[![Build Status](https://travis-ci.org/ScarletsFiction/LittleYoutube-PHP.svg?branch=master)](https://travis-ci.org/ScarletsFiction/LittleYoutube-PHP)
[![Latest Version](https://img.shields.io/badge/build-stable-brightgreen.svg)](https://packagist.org/packages/scarletsfiction/littleyoutube)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE)

LittleYoutube
==========

Have you ever dreamed put your own channel on your own website?<br>
LittleYoutube is here to help you<br>

> Warn:<br>
>   Youtube doesn't like their content being scraped. Please respect their service by not use this library as a scraping bot or a replacement for their website.<br>

This library is developed to help the community.

## Table of contents
 - [LittleYoutube](#littleyoutube)
 - [Table of contents](#table-of-contents)
 - [Getting Started](#getting-started)
 - [Download via composer](#download-via-composer)
 - [Sample Usage](#sample-usage)
 - [Documentation](#documentation)
   - [LittleYoutube Options](#littleyoutube-options)
   - [Video Class](#video-class)
      - [Get video image preview](#get-video-image-preview)
      - [Get embed link](#get-embed-link)
      - [Parse subtitle](#parse-subtitle)
      - [Get video data](#get-video-data)
   - [Channel Class](#channel-class)
      - [Get RSS URL](#get-rss-url)
      - [Get channel data](#get-channel-data)
   - [Playlist Class](#playlist-class)
      - [Get playlist data](#get-playlist-data)
   - [Search Class](#playlist-class)
      - [Get search data](#get-search-data)
      - [Next result](#next-result)
      - [Previous result](#previous-result)
   - [Get last error message](#get-last-error-message)
   - [Change settings dynamically](#change-settings-dynamically)
 - [Contribution](#contribution)
 - [License](#license)

## Getting Started
>  * Clone/download this repo
>  * Include `LittleYoutube.php` to your php script

### Download via composer

Add LittleYoutube to composer.json configuration file.
```sh
$ composer require scarletsfiction/littleyoutube
```

And update it
```sh
$ composer update
```

## Sample Usage
```php
<?php
    // require 'vendor/autoload.php';
    require_once "LittleYoutube.php";

    use ScarletsFiction\LittleYoutube;

    $video = LittleYoutube::video("https://www.youtube.com/watch?v=xQomv1gqmb4");
    echo("Video ID:".$video->data['videoID']."\n");
    print_r($video->getVideoImages());
```

## Documentation
### LittleYoutube Options

Available options
```js
{
    // Must be set to save the decipher logic
    "temporaryDirectory"=>realpath("./temp"),

    // View the decipher logic as a text
    "signatureDebug"=>false || realpath("./signatureDebug.log"),

    // Get the detailed info
    "processDetail"=>true,

    // Optional if the video can't be downloaded on some country
    "useRedirector"=>false,

    // Will be slow because all url header will be checked
    "loadVideoSize"=>false,

    // Parse from VideoInfo or VideoPage
    "processVideoFrom"=>"VideoInfo" || "VideoPage"
}
```

### Video Class
> $video = LittleYoutube::video("videoURLHere", options);
> 
> //Reinit video class
> $video->init("videoURLHere");

Return video class

#### Get video image preview
> $video->getImage();

Return Indexed Array
```js
[ "HighQualityURL", "MediumQualityURL", "DefaultQualityURL" ]
```

#### Get embed link
> $video->getEmbedLink();

```php
// Usually we will wrap it with iframe

echo('<iframe width="480" height="360" src="'.$video->getEmbedLink().'" frameborder="0" allowfullscreen></iframe>');
```

#### Parse subtitle
> $video->parseSubtitle(args, asSRT);
> 
>  * args: subtitle index or xml string
>  * asSRT: return as srt format
>  * note: if you pass subtitle index, ProcessDetails must be enabled/called

```js
[
    [0]=>[
        [time] => 1.31,
        [duration] => 6.609,
        [text]=>"in a single lifetime we can take a days"
    ],
    ...
]
```

#### Get video data
> $video->data;
> 
>  * You can also call $video->processDetails() to refresh data

Return Associative Array of current video data
```js
{
    "videoID"=>"",

    //When ProcessDetail was enabled/called
    "playerID", "title", "duration", "viewCount", "like", "dislike", "author", "subtitle", "uploaded", "description", "metatag", "channelID",

    // Not available when ProcessDetails = false
    video=>{
        "encoded"=>[
            [0] => {
                "itag",
                "type"=>[
                    [0] => Media    //video
                    [1] => Format   //mp4
                    [2] => Encoder  //avc1.64001F, mp4a.40.2
                ],
                "expire",  //timestamp
                "quality", //hd720, medium, small
                "url",
                "size" //When loadVideoSize was enabled
            },
            ...
        ],
        "adaptive"=>[
            [0] => {
                "itag",
                "type"=>[
                    [0] => Media    //video
                    [1] => Format   //mp4
                    [2] => Encoder  //avc1.4d401f
                ],
                "expire",  //timestamp
                "quality", //1080p, 720p, 192k, 144k
                "url",
                "size" //When loadVideoSize was enabled
            },
            ...
        ],

        //If it's a live stream, then return m3u8 url only
        "stream"
    }
}
```

### Channel Class
> $channel = LittleYoutube::channel("channelURLHere", options);
> 
> //Reinit channel class
> $channel->init("channelURLHere");

Return channel class

#### Get RSS URL
> $channel->getChannelRSS();

Return string
```
https://www.youtube.com/feeds/videos.xml?channel_id=...
```

#### Get channel data
> $channel->data;
> 
>  * You can also call $channel->processDetails() to refresh data

Return Associative Array of current channel data
```js
{
    //Some data will available when ProcessDetail was enabled/called
    "channelID", "userID",

    "playlists"=>[
        [0]=>{
            "playlistID"=>""
            "title"=>"",
            "length"=>0
        },
        ...
    ]

    "videos"=>[
        [0]=>{
            "videoID"=>""
            "title"=>"",
            "viewCount"=>0
        },
        ...
    ]
}
```

### Playlist Class
> $playlist = LittleYoutube::playlist("playlistURLHere", options);
> 
> //Reinit playlist class
> $playlist->init("playlistURLHere");

Return playlist class

#### Get playlist data
> $playlist->data;
> 
>  * You can also call $playlist->processDetails() to refresh data

Return string
```js
{
  //Some data will available when ProcessDetail was enabled/called
  "playlistID", "channelID", "userID",

  "userData"=>{
    "name", image
  },

  "videos"=>[
    [0]=>{
      "title", "videoID"
    }, 
    ...
  ]
}
```

### Search Class
> $search = LittleYoutube::search("searchQueryHere", options);
> 
> //Reinit search class
> $search->init("searchQueryHere");

Return search class

#### Get search data
> $search->data;
> 
>  * You can also call $search->processDetails() to refresh data

Return string
```js
{
  "query",

  // Not available when ProcessDetails = false
  "video"=>[
    [0]=>{
      "videoID", "title", "duration", "userID", "userName", "uploaded", "views"
    }
  ],

  //When available
  "next", "previous"
}
```

### Next result
> $search->next();

This will add result from the next page to current data

### Change settings dynamically
You can also change the settings after initialize LittleYoutube class
> $classes->settings[options] = value;

## Contribution

If you want to help in LittleYoutube library, please make it even better and start a pull request into it.

Don't forget to follow me ^.^)/

## License

LittleYoutube is under the MIT license.