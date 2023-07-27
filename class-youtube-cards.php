<?php

namespace softcoderselements\WidgetsManager\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Widget_Base;
use Elementor\Icons_Manager;
use softcoderselements\WidgetsManager\Widgets_Loader;

class YouTube_Cards_Widget extends Widget_Base
{
    public function get_name()
    {
        return 'youtube-cards';
    }
    public function get_title()
    {
        return __('YouTube Cards', 'startup-blog');
    }
    public function get_icon()
    {
        return 'eicon-youtube';
    }
    public function get_categories()
    {
        return ['general'];
    }
    protected function _register_controls()
    {
        $this->register_content_controls();
        $this->register_video_options_controls();
        $this->register_style_controls();
    }
    private function register_content_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'startup-blog'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'api_key',
            [
                'label' => __('API Key', 'startup-blog'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => '',
                'default' => 'AIzaSyCKxhRBg_3cuK_mquOTVnAC772akqwScLQ',
            ]
        );
        $this->add_control(
            'source_type',
            [
                'label' => __('Source Type', 'startup-blog'),
                'type' => Controls_Manager::SELECT,
                'default' => 'channel',
                'options' => [
                    'channel' => __('Channel', 'startup-blog'),
                    'playlist' => __('Playlist', 'startup-blog'),
                ],
            ]
        );
        $this->add_control(
            'channel_id',
            [
                'label' => __('Channel Link/ID', 'startup-blog'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => '',
                'default' => 'UClyYD9b8dd5xUfmc8cCQ5gw',
                'condition' => [
                    'source_type' => 'channel',
                ],
            ]
        );
        $this->add_control(
            'playlist_id',
            [
                'label' => __('Playlist Link/ID', 'startup-blog'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => '',
                'default' => 'PLfvBR2iSjOSZRoBuuH1r4NAwDSiDuB4B6',
                'condition' => [
                    'source_type' => 'playlist',
                ],
            ]
        );
        $this->add_control(
            'columns_count',
            [
                'label' => __('Columns Count', 'startup-blog'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    1 => __('1', 'startup-blog'),
                    2 => __('2', 'startup-blog'),
                    3 => __('3', 'startup-blog'),
                    4 => __('4', 'startup-blog'),
                ],
                'default' => 3,
            ]
        );
        $this->add_control(
            'videos_per_page',
            [
                'label' => __('Videos Per Page', 'startup-blog'),
                'type' => Controls_Manager::NUMBER,
                'default' => 9,
            ]
        );
        $this->add_control(
            'load_more_button_text',
            [
                'label' => __('Load More Button Text', 'startup-blog'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => '',
                'default' => __('Load More', 'startup-blog'),
            ]
        );
        $this->end_controls_section();
    }
    private function register_video_options_controls()
    {
        $this->start_controls_section(
            'video_options_section',
            [
                'label' => __('Video Options', 'startup-blog'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'controls',
            [
                'label' => __('Show Controls', 'startup-blog'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        $this->add_control(
            'loop',
            [
                'label' => __('Loop', 'startup-blog'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'default' => '',
            ]
        );
        $this->add_control(
            'disablekb',
            [
                'label' => __('Disable Keyboard', 'startup-blog'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'default' => '',
            ]
        );
        $this->add_control(
            'mute',
            [
                'label' => __('Mute', 'startup-blog'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'default' => '',
            ]
        );
        $this->add_control(
            'showinfo',
            [
                'label' => __('Show Info', 'startup-blog'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        $this->add_control(
            'autohide',
            [
                'label' => __('Auto Hide Controls', 'startup-blog'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        $this->end_controls_section();
    }
    private function register_style_controls()
    {
        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Style', 'startup-blog'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'row_gap',
            [
                'label' => __('Row Gap', 'startup-blog'),
                'type' => Controls_Manager::NUMBER,
                'default' => 20,
                'selectors' => [
                    '{{WRAPPER}} .youtube-cards-grid' => 'grid-row-gap: {{VALUE}}px;',
                ],
            ]
        );
        $this->add_control(
            'column_gap',
            [
                'label' => __('Column Gap', 'startup-blog'),
                'type' => Controls_Manager::NUMBER,
                'default' => 20,
                'selectors' => [
                    '{{WRAPPER}} .youtube-cards-grid' => 'grid-column-gap: {{VALUE}}px;',
                ],
            ]
        );
        $this->add_control(
            'aspect_ratio',
            [
                'label' => __('Aspect Ratio', 'startup-blog'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '16:9' => '16:9',
                    '4:3' => '4:3',
                    '1:1' => '1:1',
                ],
                'default' => '16:9',
                'selectors' => [
                    '{{WRAPPER}} .youtube-cards-grid .youtube-card' => 'padding-bottom: calc(100% / {{VALUE}});',
                ],
            ]
        );
        $this->add_control(
            'video_border_radius',
            [
                'label' => __('Video Border Radius', 'startup-blog'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .youtube-cards-grid .youtube-card iframe' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'load_more_button_style',
            [
                'label' => __('Load More Button Style', 'startup-blog'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .load-more-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings();
        // Widget rendering logic goes here
        // Retrieve the API Key from the settings
        $api_key = !empty($settings['api_key']) ? $settings['api_key'] : 'xxxxxLATERxxxxx';
        // Retrieve other settings
        $source_type = $settings['source_type'];

        if ($source_type == 'channel') {
            $channelid = !empty($settings['channel_id']) ? $settings['channel_id'] :
                'UClyYD9b8dd5xUfmc8cCQ5gw';
        }

        if ($source_type == 'playlist') {
            $playlist_id = !empty($settings['playlist_id']) ? $settings['playlist_id'] :
                'PLfvBR2iSjOSZRoBuuH1r4NAwDSiDuB4B6';
        }

        $columns_count = !empty($settings['columns_count']) ? $settings['columns_count'] : 3;
        $videos_per_page = !empty($settings['videos_per_page']) ? $settings['videos_per_page'] :
            9;
        $load_more_text = !empty($settings['load_more_button_text']) ?
            $settings['load_more_button_text'] : __('Load More', 'startup-blog');
        $controls = !empty($settings['controls']) ? $settings['controls'] : 'true';
        $loop = !empty($settings['loop']) ? $settings['loop'] : '';
        $disable_kb = !empty($settings['disablekb']) ? $settings['disablekb'] : '';
        $mute = !empty($settings['mute']) ? $settings['mute'] : '';
        $show_info = !empty($settings['showinfo']) ? $settings['showinfo'] : 'true';
        $auto_hide_controls = !empty($settings['autohide']) ? $settings['autohide'] : 'true';

        $videosUrl = 'https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=' . $channelid . "&maxResults=$videos_per_page&order=date&key=" . $api_key;

        // URL to retrieve videos

        $curl = curl_init();

        // Set URL to retrieve videos
        curl_setopt($curl, CURLOPT_URL, $videosUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // Execute cURL request to retrieve videos
        $videosResponse = curl_exec($curl);

        $json_decode = json_decode($videosResponse, true);


        $items = $json_decode['items'];


         echo "<pre>";
         print_r($items);
        echo "</pre>";




?>
        <div class="back-blog__area">
            <div class="row" id="video-list">

                <?php foreach ($items as $item) {
                    $videoId = '';
                    if(isset($item['id']['videoId'])) {
                        $videoId = $item['id']['videoId'];
                   
                    

                    $commenturl = 'https://www.googleapis.com/youtube/v3/videos?part=statistics&id=' . $videoId . '&key=' . $api_key;

                    $curl = curl_init();

                    // Set URL to retrieve videos
                    curl_setopt($curl, CURLOPT_URL, $commenturl);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                    // Execute cURL request to retrieve videos
                    $commentResponse = curl_exec($curl);

                    $comment_decode = json_decode($commentResponse, true);


                    $items = $comment_decode['items'];

                    $viewcount = $items[0]['statistics']['viewCount'];
                    $commentCount = $items[0]['statistics']['commentCount'];
                }


                ?>
                    <div class="col-xxl-<?php echo $columns_count; ?> col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 video">
                        <div class="blog__card mb-50">
                            <div class="blog__thumb w-img p-relative">
                                <div class="blog__thumb--image thumbnail-popup" data-video-id="<?php echo $videoId; ?>">
                                    <img src="<?php echo $item['snippet']['thumbnails']['medium']['url']; ?>" alt="This the first card image">
                                    <i class="fas fa-play-circle"></i>
                                </div>
                                <div class="popup-overlay">
                                    <div class="popup-content">
                                        <iframe src="" frameborder="0" allowfullscreen></iframe>
                                        <button class="close-btn">Close</button>
                                    </div>
                                </div>
                            </div>
                            <div class="blog__card--content">
                                <div class="blog__card--content-area mb-25">
                                    <h3 class="blog__card--title"><?php echo $item['snippet']['title']; ?></h3>
                                </div>
                                <div class="blog__card--icon ">
                                    <div class="blog__card--icon-2">
                                        <div class="blog__card--icon-2-first">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                            </svg>
                                            <span><?php echo $this->view_format_number($viewcount); ?> views</span>
                                        </div>
                                        <div class="blog__card--icon-2-second">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle">
                                                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                                            </svg>
                                            <span><?php echo $this->view_format_number($commentCount); ?> comment</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
            <div class="load-moreoption">
                <button class="load-more-button" id="load-more-button"><?php echo esc_html($load_more_text); ?> </button>
            </div>
        </div>


        <style>
            .load-moreoption {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .back-blog__area .blog__card {
                border-radius: 6px;
                box-shadow: 0px 30px 60px 0px rgba(0, 15, 56, 0.1);
                margin: 0 3px;
            }

            .back-blog__area .blog__thumb {
                position: relative;
                overflow: hidden;
            }

            .back-blog__area .blog__thumb--image img {
                border-radius: 6px 6px 0 0;
                transition: all 0.5s ease 0s;
            }

            .back-blog__area .blog__thumb--pre-title {
                font-size: 14px;
                font-weight: 500;
                line-height: 22px;
                padding: 0 12px 0 12px;
                color: #0f1629;
                background-color: #ffffff;
                border-radius: 12px;
                border: 1px solid #ebebf1;
                position: absolute;
                z-index: 1;
                right: 6%;
                top: 8%;
            }

            .back-blog__area .blog__card--content {
                padding: 28px 36px 16px 37px;
            }

            .mb-25 {
                margin-bottom: 25px;
            }

            .back-blog__area .blog__card--title {
                font-size: 20px;
                font-weight: 800;
                line-height: 28px;
                padding: 5px 0 0 0;
            }

            .back-blog__area .blog__card--title a {
                color: #020334;
            }

            .back-blog__area .blog__card--icon {
                padding-top: 20px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                position: relative;
            }

            .back-blog__area .blog__card--icon::before {
                position: absolute;
                display: inline-block;
                content: "";
                left: -36px;
                bottom: 42px;
                border-top: 1px solid rgba(15, 22, 41, 0.078);
                width: 370px;
            }

            .back-blog__area .blog__card--icon-2 {
                display: flex;
            }

            .back-blog__area .blog__card--icon-2-first {
                margin-right: 17px;
            }

            .back-blog__area .blog__card--icon-2-first svg {
                height: 17px;
            }

            .back-blog__area .blog__card--icon-2-first span {
                vertical-align: middle;
            }

            .back-blog__area .blog__card--icon-2-second svg {
                height: 17px;
            }

            .back-blog__area .blog__card--icon-2-second span {
                vertical-align: middle;
            }

            .blog__thumb {
                position: relative;
            }

            .youtube-playbtn {
                position: absolute;
            }

            .thumbnail-popup {
                display: inline-block;
                position: relative;
                cursor: pointer;
                width: 100%;
            }

            .thumbnail {
                position: relative;
            }

            .fas.fa-play-circle {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                font-size: 48px;
                color: #fff;
                opacity: 1;
                transition: opacity 0.3s ease;
            }

            .thumbnail-popup:hover .fas.fa-play-circle {
                opacity: 1;
            }

            .popup-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.8);
                z-index: 9999;
            }

            .popup-content {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            .close-btn {
                position: absolute;
                top: 10px;
                right: 10px;
                color: #fff;
            }

            .popup-content iframe {
                width: 640px;
                height: 360px;
            }

            .load-more-button {
                display: block;
                background: #000;
                color: #fff;
                padding: 8px 30px;
                margin-top: 35px;
            }
        </style>
        <script src="https://apis.google.com/js/api.js"></script>
        <script>
            jQuery(document).ready(function() {
                // Find all thumbnail popup elements
                var thumbnails = document.querySelectorAll('.thumbnail-popup');

                // Attach event listeners to each thumbnail
                thumbnails.forEach(function(thumbnail) {
                    thumbnail.addEventListener('click', function() {
                        var videoId = this.getAttribute('data-video-id');
                        var iframe = document.createElement('iframe');
                        iframe.src = 'https://www.youtube.com/embed/' + videoId + '?rel=0&autoplay=1';

                        var popup = document.querySelector('.popup-overlay');
                        popup.style.display = 'block';
                        popup.querySelector('.popup-content').appendChild(iframe);
                    });
                });

                // Close the popup
                document.querySelector('.close-btn').addEventListener('click', function() {
                    var popup = document.querySelector('.popup-overlay');
                    popup.style.display = 'none';
                    popup.querySelector('.popup-content').innerHTML = '';
                });
            });
        </script>

        <script>
            window.onload = function() {
                gapi.load('client', function() {
                    gapi.client.load('youtube', 'v3', function() {
                        var nextPageToken = ''; // To store the token for the next page of results

                        // Function to fetch more videos
                        function fetchMoreVideos() {
                            gapi.client.init({
                                'apiKey': '<?php echo $api_key; ?>',
                            }).then(function() {
                                <?php if ($source_type == 'playlist') { ?>
                                    return gapi.client.request({
                                        'path': 'youtube/v3/playlistItems',
                                        'params': {
                                            'part': 'snippet',
                                            'maxResults': '<?php echo $videos_per_page; ?>', // Adjust the number of results per page as needed
                                            'playlistId': '<?php echo $playlist_id; ?>',
                                            'pageToken': nextPageToken,
                                        }
                                    });
                                <?php } ?>
                                <?php if ($source_type == 'channel') { ?>
                                    return gapi.client.request({
                                        'path': 'youtube/v3/search?',
                                        'params': {
                                            'part': 'snippet',
                                            'maxResults': '<?php echo $videos_per_page; ?>', // Adjust the number of results per page as needed
                                            'channelId': '<?php echo $channelid; ?>',
                                            'pageToken': nextPageToken
                                        }
                                    });
                                <?php } ?>
                            }).then(function(response) {
                                var videos = response.result.items;
                                console.log(response);
                                var videoList = document.getElementById('video-list');
                                // Process the fetched videos and append them to the video list
                                videos.forEach(function(video) {
                                    var video_html = '';

                                    var apiKey = '<?php echo $api_key; ?>';


                                    function getVideoStatistics(videoId) {
                                        return new Promise((resolve, reject) => {
                                            gapi.client.youtube.videos
                                            .list({
                                                part: 'statistics',
                                                id: videoId,
                                            })
                                            .then((response) => {
                                                const video = response.result.items[0];
                                                const viewCount = parseInt(video.statistics.viewCount);
                                                resolve(viewCount);
                                            })
                                            .catch((error) => {
                                                reject(error);
                                            });
                                        });
                                    }
                                    function getCommentCount(videoId) {
                                        return new Promise((resolve, reject) => {
                                            gapi.client.youtube.commentThreads
                                            .list({
                                                part: 'snippet',
                                                videoId: videoId,
                                                maxResults: 1, // We only need the total number of comments, so retrieving one comment is sufficient
                                            })
                                            .then((response) => {
                                                const commentCount = response.result.pageInfo.totalResults;
                                                resolve(commentCount);
                                            })
                                            .catch((error) => {
                                                reject(error);
                                            });
                                        });
                                    }

                                    // Load the JavaScript client library
                                    function loadClient() {
                                        gapi.client.setApiKey(apiKey);
                                        return gapi.client.load('https://www.googleapis.com/discovery/v1/apis/youtube/v3/rest');
                                    }

                                    function getVideoDetails(videoId) {
                                        return new Promise((resolve, reject) => {
                                            gapi.client.youtube.videos
                                            .list({
                                                part: 'statistics',
                                                id: videoId,
                                            })
                                            .then((response) => {
                                                const video = response.result.items[0];
                                                const details = {
                                                videoId: videoId,
                                                comments: video.statistics.commentCount,
                                                views: video.statistics.viewCount,
                                                };
                                                resolve(details);
                                            })
                                            .catch((error) => {
                                                reject(error);
                                            });
                                        });
                                    }

                                    var playlistId = '<?php echo $playlist_id; ?>';

                                    loadClient().then(() => {
                                        getPlaylistVideosWithDetails(playlistId)
                                        .then((videos) => {
                                            console.log(videos[0].comments);

                                            videos.forEach((video) => {
                                              // console.log('Comments:', video.comments);
                                               
                                               var videoId = video.videoId;

                                                document.getElementById("comments-count").innerHTML = video.comments + " " +"Comments";
                                                document.getElementById("view-count").innerHTML = video.views + " " +"Views";
                                                
                                            });
                                        })
                                        .catch((error) => {
                                            console.error('Error retrieving playlist videos:', error);
                                        });
                                    });


                                    function getPlaylistVideosWithDetails(playlistId) {
                                        return new Promise((resolve, reject) => {
                                            gapi.client.youtube.playlistItems
                                            .list({
                                                part: 'snippet',
                                                playlistId: playlistId,
                                                maxResults: '<?php echo $videos_per_page; ?>', // Set the maximum number of results per page (maximum is 50)
                                                'pageToken': nextPageToken,
                                            })
                                            .then(async (response) => {
                                                const videos = response.result.items;
                                                const videoPromises = videos.map(async (video) => {
                                                const videoId = video.snippet.resourceId.videoId;
                                                const details = await getVideoDetails(videoId);
                                                return details;
                                                });

                                                Promise.all(videoPromises)
                                                .then((videoDetails) => {
                                                    resolve(videoDetails);
                                                })
                                                .catch((error) => {
                                                    reject(error);
                                                });
                                            })
                                            .catch((error) => {
                                                reject(error);
                                            });
                                        });
                                    }

                                    // Example usage

                                    <?php if ($source_type == 'channel') { ?>
                                        const videoId = video.id.videoId; // Replace with the actual video ID
                                    

                                        loadClient().then(() => {
                                            getVideoStatistics(videoId)
                                                .then((viewCount) => {

                                                    document.getElementById("view-count").innerHTML = viewCount+ " " +"Views";
                                                })
                                                .catch((error) => {
                                                console.error('Error retrieving view count:', error);
                                            });

                                            getCommentCount(videoId)
                                                .then((commentCount) => {
                                                document.getElementById("comments-count").innerHTML = commentCount+ " " +"Comments";
                                                })
                                                .catch((error) => {
                                                console.error('Error retrieving comment count:', error);
                                            });
                                        });

                                        <?php } ?>

                                   
















                                    video_html += '<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 video">';
                                    video_html += '<div class="blog__card mb-50">';
                                    video_html += '<div class="blog__thumb w-img p-relative">';
                                    video_html += '<div class="blog__thumb--image thumbnail-popup" data-video-id="PAsVRL5gxeA">';
                                    video_html += '<img decoding="async" src="' + video.snippet.thumbnails.medium.url + '" alt="This the first card image">';
                                    video_html += '<i class="fas fa-play-circle" aria-hidden="true"></i>';
                                    video_html += '</div>';
                                    video_html += '<div class="popup-overlay">';
                                    video_html += '<div class="popup-content">';
                                    video_html += '<iframe src="" frameborder="0" allowfullscreen=""></iframe>';
                                    video_html += '<button class="close-btn">Close</button>';
                                    video_html += '</div>';
                                    video_html += '</div>';
                                    video_html += '</div>';
                                    video_html += '<div class="blog__card--content">';
                                    video_html += '<div class="blog__card--content-area mb-25">';
                                    video_html += '<h3 class="blog__card--title">' + video.snippet.title + '</h3>';
                                    video_html += '</div>';
                                    video_html += '<div class="blog__card--icon ">';
                                    video_html += '<div class="blog__card--icon-2">';
                                    video_html += '<div class="blog__card--icon-2-first">';
                                    video_html += '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">';
                                    video_html += '<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>';
                                    video_html += '</svg>';
                                    video_html += '<span id="view-count" class="view-count"></span>';
                                    video_html += '</div>';
                                    video_html += '<div class="blog__card--icon-2-second">';
                                    video_html += '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle">';
                                    video_html += '<path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>';
                                    video_html += '</svg>';
                                    video_html += '<span id="comments-count" class="comments-count"></span>';
                                    video_html += '</div>';
                                    video_html += '</div>';
                                    video_html += '</div>';
                                    video_html += '</div>';
                                    video_html += '</div>';




                                    videoList.innerHTML += video_html;
                                });
                                nextPageToken = response.result.nextPageToken;
                                if (nextPageToken) {
                                    // Enable the "Load More" button if there are more videos
                                    var loadMoreButton = document.getElementById('load-more-button');
                                    loadMoreButton.disabled = false;
                                } else {
                                    // Disable the "Load More" button if there are no more videos
                                    var loadMoreButton = document.getElementById('load-more-button');
                                    loadMoreButton.disabled = true;
                                }
                            }, function(reason) {
                                console.error('Error: ' + reason.result.error.message);
                            });
                        }

                        // Event listener for the "Load More" button click
                        var loadMoreButton = document.getElementById('load-more-button');
                        loadMoreButton.addEventListener('click', function() {
                            this.disabled = true; // Disable the button while loading
                            fetchMoreVideos();
                        });

                    });
                });
            };



        </script>


<?php
    }

    public function view_format_number($number) {
        $number = (0+str_replace(",","",$number));
    
        if(!is_numeric($number)) return false;
    
        if($number > 1000000000000 ) {
            return round(( $number/1000000000000),2).'T';
        }
        elseif($number > 1000000000 ) {
            return round(( $number/1000000000),2).'B';
        }
        elseif($number > 1000000 ) {
            return round(( $number/1000000),2).'M';
        }
        elseif($number > 1000 ) {
            return round(( $number/1000),2).'K';
        }else {
            return number_format( $number);
        }
    
    }
}
