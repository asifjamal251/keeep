
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */


window.serializeForm = function(data){
    var convertedJSON = {};
    new FormData(data).forEach(function(value, key) { 
        convertedJSON[key] = value;
    });
    return convertedJSON;
}





window.getURLParameter=function(name) {
    return decodeURIComponent(
        (RegExp('[?|&]'+name + '=' + '(.+?)(&|$)').exec(location.search)||['',''])[1]
    );
}
window.UrlParams=function(uri, params, value) {
    if (typeof params == 'object') {
        Object.keys(params).map(paramKey=>{
            var re = new RegExp("([?&])" + paramKey + "=.*?(&|$)", "i");
            var separator = uri.indexOf('?') !== -1 ? "&" : "?";
            if (uri.match(re)) {
                 uri = uri.replace(re, '$1' + paramKey + "=" + encodeURIComponent(params[paramKey]) + '$2');
            }
            else {
                 uri = uri + separator + paramKey + "=" + encodeURIComponent(params[paramKey]);
            }
        })
        return uri;
    }
    var re = new RegExp("([?&])" + params + "=.*?(&|$)", "i");
    var separator = uri.indexOf('?') !== -1 ? "&" : "?";
    if (uri.match(re)) {
        return uri.replace(re, '$1' + params + "=" + encodeURIComponent(value) + '$2');
    }
    else {
        return uri + separator + params + "=" + encodeURIComponent(value);
    }
}








require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/Master');
