/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* global gapi */

var resultNumber = 5;
var nextPageToken = "";
var query="AKB48";
var result = "";
var count=0;
var key=0;
//var pageMark="";
//var page=0;
//var totalPage=0;
//
// Your use of the YouTube API must comply with the Terms of Service:
// https://developers.google.com/youtube/terms
// Called automatically when JavaScript client library is loaded.
function onClientLoad() {
    //gapi.client.setApiKey('AIzaSyCmIxo-TtHpnedhNpZtE-pD2489i7aX42w');
    //gapi.client.load('youtube', 'v3',onYouTubeApiLoad);
    //gapi.client.load('youtube', 'v3').then(searchFirst);
    
    gapi.client.load('youtube','v3',function() {
        gapi.client.setApiKey('AIzaSyCmIxo-TtHpnedhNpZtE-pD2489i7aX42w');
        //searchFirst();    
    });
    
    //gapi.client.setApiKey('AIzaSyCmIxo-TtHpnedhNpZtE-pD2489i7aX42w');
    //document.getElementById('load').innerHTML = "LOAD!!!";
    //search();
    //document.getElementById('load').innerHTML = "LOAD2!!!";
    
}
// Called automatically when YouTube API interface is loaded (see line 9).
function onYouTubeApiLoad() {     
    gapi.client.setApiKey('AIzaSyCmIxo-TtHpnedhNpZtE-pD2489i7aX42w');
    search();
}
 
// Called when the search button is clicked in the html code


function searchFirst(keyword,countKey) {  
    key=countKey;
    query = keyword;    
    // Use the JavaScript client library to create a search.list() API call.
    var request = gapi.client.youtube.search.list({
        part: 'snippet',
        maxResults: resultNumber,
        type: 'video',
        q:query,     
    });
    
    //page++;
    // Send the request to the API server, call the onSearchResponse function when the data is returned
    request.execute(onSearchResponse);
}

// Triggered by this line: request.execute(onSearchResponse);
function onSearchResponse(response,setKey) {      
    //var responseString = JSON.stringify(response, '', 1); 
    //var total = response['pageInfo'].totalResults;
    nextPageToken = response['nextPageToken'];
    var item = response['items'];    
        
    for (var i = 0; i < resultNumber; i++) {
        var id = item[i].id.videoId;
        var title = item[i].snippet.title;
        //result=title+"\t https://www.youtube.com/watch?v="+id+"\n";
        result='<iframe name="video" width="560" height="315" src="https://www.youtube.com/embed/'+id+'" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>';
        var setId = "output"+count;
        var output = document.getElementById(setId);  
        var ele = document.createElement("div");  
     ele.setAttribute("id","video"+query);  
     ele.setAttribute("class","inner");  
     ele.innerHTML=result;  
     output.appendChild(ele); 
    }
    
    //pageMark="共 " +page*resultNumber+"/"+total+" 筆";
    //document.getElementById('select').innerHTML = nextPageToken;  
    //document.getElementById('result').innerHTML = result; 
    //document.getElementById('totalNumber').innerHTML = total;
    //document.getElementById('response').innerHTML = responseString;
    
     count++;
}

function getResult(keyword){
    searchFirst(keyword);
    return result;
}

// Retrieve the next page.
function nextPage() {
  search(nextPageToken);
}

/*
// Retrieve the previous page.
function previousPage() {
  search(prevPageToken);
}

*/

