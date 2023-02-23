<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
// Create two variable with the names of the months and days in an array
var monthNames = [ "Januari", "Februari", "Maret", "April", "Mai", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ]; 
var dayNames= ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"]

// Create a newDate() object
var newDate = new Date();
// Extract the current date from Date object
newDate.setDate(newDate.getDate());
// Output the day, date, month and year   
$('#Date').html(dayNames[newDate.getDay()] + ", " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

setInterval( function() {
    // Create a newDate() object and extract the seconds of the current time on the visitor's
    var seconds = new Date().getSeconds();
    // Add a leading zero to seconds value
    $("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
    },1000);
    
setInterval( function() {
    // Create a newDate() object and extract the minutes of the current time on the visitor's
    var minutes = new Date().getMinutes();
    // Add a leading zero to the minutes value
    $("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
    },1000);
    
setInterval( function() {
    // Create a newDate() object and extract the hours of the current time on the visitor's
    var hours = new Date().getHours();
    // Add a leading zero to the hours value
    $("#hours").html(( hours < 10 ? "0" : "" ) + hours);
    }, 1000);   
});
</script>
<style type="text/css">
    @font-face {
    font-family: 'BebasNeueRegular';
    src: url('BebasNeue-webfont.eot');
    src: url('BebasNeue-webfont.eot?#iefix') format('embedded-opentype'),
         url('BebasNeue-webfont.woff') format('woff'),
         url('BebasNeue-webfont.ttf') format('truetype'),
         url('BebasNeue-webfont.svg#BebasNeueRegular') format('svg');
    font-weight: normal;
    font-style: normal;
}

/*.container {
    width: 960px;
    margin: 0 auto;
    overflow: hidden;
}*/

.clock {
    width: 100%;
    margin: 0 auto;
    /*padding: 30px;*/
    /*border: 1px solid #333;*/
    color: #fff;
}

#Date {
    font-family: 'BebasNeueRegular', Arial, Helvetica, sans-serif;
    font-size: 36px;
    text-align: center;
    text-shadow: 0 0 5px #00c6ff;
}

ul.jam {
    width: 100%;
    margin: 0 auto;
    padding: 0px;
    list-style: none;
    text-align: center;
}

ul.jam li {
    display: inline;
    font-size: 6em;
    text-align: center;
    font-family: 'BebasNeueRegular', Arial, Helvetica, sans-serif;
    text-shadow: 0 0 5px #00c6ff;
}

#point {
    position: relative;
    -moz-animation: mymove 1s ease infinite;
    -webkit-animation: mymove 1s ease infinite;
    padding-left: 10px;
    padding-right: 10px;
}

/* Simple Animation */
@-webkit-keyframes mymove {
    0% {opacity: 1.0;
    text-shadow: 0 0 20px #00c6ff;
}

50% {
    opacity: 0;
    text-shadow: none;
}

100% {
    opacity: 1.0;
    text-shadow: 0 0 20px #00c6ff;
}   
}

@-moz-keyframes mymove {
    0% {
        opacity: 1.0;
        text-shadow: 0 0 20px #00c6ff;
    }

    50% {
        opacity: 0;
        text-shadow: none;
    }

    100% {
        opacity: 1.0;
        text-shadow: 0 0 20px #00c6ff;
    };
}
</style>