console.clear();

var data = [];
var videos = document.getElementsByClassName("yt-simple-endpoint style-scope ytd-playlist-video-renderer");
for(video of videos) {
    data.push({
        videoLink: null != video.href ? video.href : "Not available"
    });
}

console.log(JSON.stringify(data));