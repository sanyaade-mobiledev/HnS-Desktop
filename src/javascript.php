<?php
session_start();
header("Content-Type: application/x-javascript");
?>
/* ---------------------------------------------------- */
/* ----------- >>>  Global Javascript  <<< ------------ */
/* ---------------------------------------------------- */

/* ---------------------------------------------------- */
/* Site Name:    HnS Desktop
/* Site Creator: Andrew Gerst
/* Site Created: 03/25/2010
/* Last Updated: <?php echo date("m") . "/" , (date("d") - 1) . "/" . date("Y") . "\n"; ?>
/* ---------------------------------------------------- */

/* ---------------------------------------------------- */
/* ------------ >>>  Table of Contents  <<< ----------- */
/* ---------------------------------------------------- */
/* dConfig Variable Arrays
/* - User
/* - Styles
/* - Desktop
/* - Taskbar
/* - Launchers
/* Stylesheet
/* Screen Dimensions
/* Black / White Out Variables
/* Misc Functions
/* - In Array
/* - Get The Date
/* -- Get Date
/* - Update Captcha Image
/* - Div Selection
/* Panel Content (Logged In)
/* - Logout
/* - Preferences
/* - Notepad
/* - Flash Name
/* - Piano
/* Panel Variables (Logged In)
/* - (Dialog) Loading
/* - User Desktop
/* - Logout
/* - Preferences
/* - Notepad
/* - Flash Name
/* - Piano
/* Panel Content (Logged Out)
/* - Login
/* - Register
/* Panel Variables (Logged Out)
/* - Login
/* - Register
/* - (Dialog) Try Again
/* Document Ready Functions (Logged Out)
/* - Display Functions
/* -- Login
/* -- Register
/* - Input (Text) Username (Focus)
/* - Input (Submit) Signin (Click)
/* - Input (Button) Signup (Click)
/* - Input (Submit) Register (Click)
/* Document Ready Functions (Logged In)
/* - Initiate Desktop
/* -- Display Functions
/* --- (Dialog) Loading
/* --- User Desktop
/* - Set Desktop Config
/* -- Desktop Config
/* -- Taskbar Config
/* - Autorun Functions
/* -- Logout
/* -- Notepad
/* -- Preferences
/* -- Flash-Name
/* -- Piano
/* - Input (Submit) Logout (Click)
/* - Flash-Name (Load)
/* Window Load Functions
/* - Window Drag Effect
/* -- Header (Mouse Down)
/* -- Header Text (Mouse Down)
/* -- Header (Mouse Up)
/* -- Header Text (Mouse Up)
/* - Window Tool
/* -- Close (Click)
/* -- Maximize (Toggle)
/* -- (If) BWrap (Is) Hidden
/* -- Minimize (Click)
/* -- Toggle (Click)
/* -- Toggle (Toggle)
/* Window Load Functions (Logged In)
/* - Desktop
/* -- Body (Click)
/* -- Desktop Thumb (Click)
/* -- Document Element (Key Down)
/* -- Taskbar Transparency (Toggle)
/* - Taskbar
/* -- Taskbutton (Click)
/* -- (If) TButton (Is) Hidden
/* -- Quickstart Splitbar (Mouse Down)
/* -- Quickstart Splitbar (Bind - Mouse Move)
/* -- Tray Splitbar (Mouse Down)
/* -- Tray Splitbar (Bind - Mouse Move)
/* -- Splitbar (Mouse Leave)
/* -- Splitbar (Mouse Up)
/* -- Tray Toggle (Toggle)
/* Drag Resize
/* ---------------------------------------------------- */

/* begin desktop config variable arrays */

var dConfig = {
"user":{
"username":"guest",
"id":0,
"access_level":0,
"first_name":"",
"last_name":"",
"isGuest":1
},

"styles":{
"theme_id":"1",
"theme_name":"default",
"wallpaper_file":"i/vista.jpg",
"wallpaper_position":"center center",
"background_color":"ffffff",
"font_color":"000000",
"transparency":true
},

"desktop":{
"thumb_height":90,
"thumb_width":80
},

"taskbar":{
"height":30,
"start_width":110,
"quickstart_width":60,
"quickstart_minwidth":30,
"quickstart_maxwidth":300,
"tray_width":110,
"tray_minwidth":100,
"tray_maxwidth":300,
"currentinfo_width":75
},

"launchers":{
"thumbs":["notepad","preferences","logout","flash-name","piano"],
"startmenu":["notepad"],
"startmenutool":["preferences","feedback","about-hnsdesktop"],
"quickstart":["notepad","preferences","feedback"],
"contextmenu":["preferences","feedback","about-hnsdesktop"],
"shortcut":["notepad","preferences","feedback"],
"tray":["notepad","preferences","feedback"],
"autorun":["logout","preferences","notepad","piano"]
}
}

/* end desktop config variable arrays */

var stylesheet = '<link rel="stylesheet" type="text/css" href="css.php?id=' + dConfig.styles.theme_id + '" media="all" />';
$('head').append(stylesheet);

var myHeight = 0, myWidth = 0;
if (typeof(window.innerWidth) == 'number') { // Non-IE
myHeight = window.innerHeight;
myWidth = window.innerWidth;
} else if (document.documentElement && (document.documentElement.clientWidth || document.documentElement.clientHeight)) { // IE 6+ in 'standards compliant mode'
myHeight = document.documentElement.clientHeight;
myWidth = document.documentElement.clientWidth;
} else if (document.body && (document.body.clientWidth || document.body.clientHeight)) { // IE 4 compatible
myHeight = document.body.clientHeight;
myWidth = document.body.clientWidth;
}

var blackout = document.createElement('div');
blackout.setAttribute('id','blackout');

var whiteout = document.createElement('div');
whiteout.setAttribute('id','whiteout');

/* begin misc functions */

function in_array(string, array) {
for (i = 0; i < array.length; i++) if (array[i] == string) return true;
return false;
}

function getthedate() {
var dayarray = new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
var montharray = new Array("January","February","March","April","May","June","July","August","September","October","November","December");
var mydate = new Date();
var year = mydate.getYear();
var day = mydate.getDay();
var month = mydate.getMonth();
var daym = mydate.getDate();
var hours = mydate.getHours();
var minutes = mydate.getMinutes();
var seconds = mydate.getSeconds();
var dn = "AM";

if (year < 1000) year += 1900;
if (daym < 10) daym = "0" + daym;
if (hours >= 12) dn = "PM";
if (hours > 12) {
hours = hours - 12;
}
{
d = new Date();
Time24H = new Date();
Time24H.setTime(d.getTime() + (d.getTimezoneOffset() * 60000) + 3600000);
InternetTime = Math.round((Time24H.getHours() * 60 + Time24H.getMinutes()) / 1.44);
if (InternetTime < 10) InternetTime = '00' + InternetTime;
else if (InternetTime < 100) InternetTime = '0' + InternetTime;
}

if (hours == 0) hours = 12;
if (minutes <= 9) minutes = "0" + minutes;
if (seconds <= 9) seconds = "0" + seconds;
var cdate = dayarray[day] + ", " + montharray[month] + " " + daym + " " + year + " | " + hours + ":" + minutes + ":" + seconds + " " + dn + " | @" + InternetTime + "";
var mytime = hours + ":" + minutes + ":" + seconds + " " + dn;
var mydate = (month + 1) + "/" + daym + "/" + year;
var myfulldate = dayarray[day] + ", " + montharray[month] + " " + daym + ", " + year;

$("div#tray-currentinfo div#clock").html(mytime);
$("div#tray-currentinfo div#date").html(mydate);
$("div#tray-currentinfo").attr('title', myfulldate);
}

function getdate() {
if (document.all || document.getElementById) {
setInterval("getthedate()", 1000);
} else {
getthedate();
}
}

function updatecaptchaimg() {
document.captchaimg.src = document.captchaimg.src + '?';
}

function div_selection(e, eq) {
this.e = e;
this.eq = eq;

if (this.e.target) {
this.event = this.e.target;
} else {
this.event = this.e.srcElement;
}

if (this.event.nodeType == 3) {
this.event = this.event.parentNode;
}

this.selection = $(this.event).parents().eq(this.eq).attr('id');
this.target_class = function() { return [$(this.event).attr('class')].join(''); }
this.target_id = function() { return [$(this.event).attr('id')].join(''); }
this.main = function() { return [this.selection].join(''); }
this.div_main = function() { return ['div#', this.selection].join(''); }
this.div_panel = function() { return ['div#', this.selection, ' div.panel'].join(''); }
this.div_panel_tl = function() { return ['div#', this.selection, ' div.panel-tl'].join(''); }
this.div_panel_bwrap = function() { return ['div#', this.selection, ' div.panel-bwrap'].join(''); }
this.div_panel_tool = function() { return ['div#', this.selection, ' div.tool'].join(''); }
}

/* end misc functions */

createTaskButton = function(task_title, task_id) {
return [
'<li id="taskbutton-', task_id, '" class="taskbutton">',
'<table class="button-wrap">',
'<tbody>',
'<tr>',
'<td class="button-left">',
'</td>',
'<td class="button-center">',
'<em unselectable="on">',
'<button type="button" id="taskbutton-', task_id, '" class="taskbutton">',
task_title,
'</button>',
'</em>',
'</td>',
'<td class="button-right">',
'</td>',
'</tr>',
'</tbody>',
'</table>',
'</li>'
].join('');
}

function panel(a,b,c,d,e,f,g,h,i,j,k,x,y,xPos,yPos,z,content) {
this.div = document.createElement('div');
this.title = a;
this.id = b;
this.closeable = c;
this.draggable = d;
this.resizable = e;
this.minimized = f;
this.minHeight = g;
this.height = h;
this.minWidth = i;
this.width = j;
this.position = k;
this.x = x;
this.y = y;
this.xPos = xPos; // left or right position (l or r)
this.yPos = yPos; // top or bottom position (t or b)
this.center = z;
this.content = content;

if (this.height > myHeight) {
this.height = myHeight;
}

if (this.width > myWidth) {
this.width = myWidth;
}

if (this.center == true) {
this.x = ((myWidth / 2) - (this.width / 2));
this.y = ((myHeight / 2) - (this.height / 2));
}

this.display = function() {
this.div.setAttribute("id",b);
this.div.setAttribute("class","drsElement");

/*
if (this.draggable == true) {
this.div.addClass("draggable");
}

if (this.resizable == true) {
this.div.addClass("resizable");
this.div.addClass("drsElement");
}

if (this.closeable == true) {
this.div.addClass("closeable");
}
*/

this.div.style.height = this.height + 'px';
this.div.style.width = this.width + 'px';
this.div.style.position = this.position;

if (this.center == false) {
if (this.xPos == "l") {
this.div.style.left = this.x + 'px';
} else if (this.xPos == "r") {
this.div.style.left = (myWidth - (this.width + this.x)) + 'px';
}

if (this.yPos == "t") {
this.div.style.top = this.y + 'px';
} else if (this.yPos == "b") {
this.div.style.top = ((myHeight - (dConfig.taskbar.height + 2)) - (this.height + this.y)) + 'px';
}
} else {
this.div.style.left = this.x + 'px';
this.div.style.top = this.y + 'px';
}

<?php
if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) {
?>

document.getElementById("desktop").appendChild(this.div);
$("div#taskbar ul#taskbuttons-strip").append(createTaskButton(this.title, this.id));

<?php
} else {
?>

document.getElementById("main").appendChild(this.div);

<?php
}
?>

this.assemble();
}

this.createPanel = function(content) {
return ['<div class="panel">',
'<div class="panel-tl"><div class="panel-tr"><div class="panel-tc"></div></div></div><div class="panel-bwrap">',
'<div class="panel-ml"><div class="panel-mr"><div class="panel-mc">', content, '</div></div></div>',
'<div class="panel-bl"><div class="panel-br"><div class="panel-bc"></div></div></div>',
'</div></div>'].join('');
}

if (this.draggable == true) {
this.addHeader = function(title) {
return ['<div class="panel-header drsMoveHandle">',
'<span class="panel-header-text">', title, '</span>',
'<div class="tools">',
'<div class="tool close"></div>',
'<div class="tool maximize"></div>',
'<div class="tool minimize"></div>',
'<div class="tool toggle"></div>',
'</div></div>'].join('');
}
} else {
this.addHeader = function(title) {
return ['<div class="panel-header">',
'<span class="panel-header-text">', title, '</span>',
'<div class="tools">',
'<div class="tool close"></div>',
'<div class="tool maximize"></div>',
'<div class="tool minimize"></div>',
'<div class="tool toggle"></div>',
'</div></div>'].join('');
}
}

this.assemble = function() {
this.html = this.createPanel(this.content);
this.div.innerHTML = this.html;
var maindiv = 'div#' + this.id;
var bwrapdiv = 'div#' + this.id + ' div.panel-bwrap';
var ptdiv = 'div#' + this.id + ' div.panel-tc';
$(ptdiv).append(this.addHeader(this.title));
$(bwrapdiv).height(($(maindiv).height() - 30));
if (this.minimized == true) {
$(maindiv).css('display','none');
}
}
}

function dialog(a,b,c,d,e,f,g,h,i,j,k,x,y,xPos,yPos,z,content) {
this.div = document.createElement('div');
this.title = a;
this.id = b;
this.closeable = c;
this.draggable = d;
this.resizable = e;
this.visible = f;
this.minHeight = g;
this.height = h;
this.minWidth = i;
this.width = j;
this.position = k;
this.x = x;
this.y = y;
this.xPos = xPos;
this.yPos = yPos;
this.center = z;
this.content = content;

if (this.height > myHeight) {
this.height = myHeight;
}

if (this.width > myWidth) {
this.width = myWidth;
}

if (this.center == true) {
this.x = ((myWidth / 2) - (this.width / 2));
this.y = ((myHeight / 2) - (this.height / 2));
}

this.display = function() {
this.div.setAttribute("id",b);

if (this.draggable == true) {
alert(this.div);
}

this.div.style.height = this.height + 'px';
this.div.style.width = this.width + 'px';
this.div.style.position = this.position;

if (this.center == false) {
if (this.xPos == "l") {
this.div.style.left = this.x + 'px';
} else if (this.xPos == "r") {
this.div.style.left = (myWidth - (this.width + this.x)) + 'px';
}

if (this.yPos == "t") {
this.div.style.top = this.y + 'px';
} else if (this.yPos == "b") {
this.div.style.top = ((myHeight - (dConfig.taskbar.height + 2)) - (this.height + this.y)) + 'px';
}
} else {
this.div.style.left = this.x + 'px';
this.div.style.top = this.y + 'px';
}

document.getElementById("main").appendChild(this.div);

this.assemble();
}

this.createDialog = function(content) {
return ['<div class="dialog"><div class="content"><div class="heading">', content, '</div></div></div>'].join('');
}

this.assemble = function() {
this.html = this.createDialog(this.content);
this.div.innerHTML = this.html;
var maindiv = 'div#' + this.id;
if (this.visible == false) {
$(maindiv).css('display','none');
}
}
}

function display(app) {
var apps = $(app).attr('id');
var app_name = "div#" + apps;
var app_tbutton = "ul#taskbuttons-strip li#taskbutton-" + apps;
var found = $("div#desktop").children(app_name);
if (found.length == 0) {
app.display();
} else {
$(app_name).show();
$(app_tbutton).show();
}
}

<?php
if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) {
include ("auth.inc.php");

/* used to temporary change a users access level
if ($_SESSION['username'] == null) {
$_SESSION['access_level'] = 2;
}
*/
?>

function desktop(taskbar_start_content, taskbar_quickstart_content) {
this.desktop = document.createElement('div');
this.taskbar = document.createElement('div');
this.desktop_thumbs = document.createElement('div');
this.taskbar_start_content = taskbar_start_content;
this.taskbar_quickstart_content = taskbar_quickstart_content;

this.display = function() {
this.desktop.setAttribute("id","desktop");
this.taskbar.setAttribute("id","taskbar");

this.desktop.style.height = (myHeight - dConfig.taskbar.height) + 'px';
this.taskbar.style.height = dConfig.taskbar.height + 'px';
document.getElementById("main").appendChild(this.desktop);
document.getElementById("main").appendChild(this.taskbar);

this.assemble();
}

this.createDesktop = function(desktop_content) {
return ['<div id="desktop-view"><div class="desktop-body">', desktop_content, '</div></div>'].join('');
}

this.createDesktopThumb = function(thumb_name) {
var app_name = thumb_name.replace("-"," ");
return [
'<div id="thumb-', thumb_name, '" class="desktop-thumb">',
'<div class="thumb-button">',
'<img src="i/thumb/blank.gif" class="thumb-image" alt="" title="', thumb_name, '" />',
'</div>',
'<div class="thumb-name" unselectable="on">', app_name, '</div>',
'</div>'
].join('');
}

this.createTaskbar = function(taskbar_start_content, taskbar_quickstart_content) {
getdate();

return [
'<div id="start">', taskbar_start_content, '</div>',
'<div id="panel-wrap">',
'<div id="quickstart-panel">', taskbar_quickstart_content, '</div>',
'<div id="taskbuttons-panel">',
'<div class="taskbuttons-strip-wrap">',
'<div id="quickstart-splitbar" class="splitbar"></div>',
'<ul id="taskbuttons-strip">',
'</ul>',
'<div id="tray-splitbar" class="splitbar"></div>',
'</div>',
'<div id="tray-panel">',
'<div class="tray-strip-wrap">',
'<ul id="tray-strip">',
'</ul>',
'<div id="tray-currentinfo">',
'<div id="clock"></div>',
'<div id="date"></div>',
'</div>',
'</div>',
'<div id="tray-toggle"></div>',
'</div>',
'</div>',
'</div>'].join('');
}

this.assemble = function() {
this.desktop_thumbs = "";
for (var i = 0; i < dConfig.launchers.thumbs.length; i++) {
this.desktop_thumbs += this.createDesktopThumb(dConfig.launchers.thumbs[i]);
}

this.desktop_content = this.desktop_thumbs;
this.desktop_html = this.createDesktop(this.desktop_content);
this.desktop.innerHTML = this.desktop_html;
this.taskbar_html = this.createTaskbar(this.taskbar_start_content, this.taskbar_quickstart_content);
this.taskbar.innerHTML = this.taskbar_html;
}
}

var taskbar_start_content = [
'<table id="startbutton" class="start-wrap">',
'<tbody>',
'<tr>',
'<td class="start-left"></td>',
'<td class="start-center">',
'<em unselectable="on">',
'<button type="button" class="start">Start</button>',
'</em>',
'</td>',
'<td class="start-right"></td>',
'</tr>',
'</tbody>',
'</table>'
].join('');

var taskbar_quickstart_content = ['<div></div>'].join('');

/* begin panel content */

var logout_content = [
'<div class="content">',
'<div class="heading">Homenet Spaces OS</div>',
'<div class="body">',
'<form action="javascript: return false" name="logout" id="logout">',
'<input type="submit" name="logout" id="logout" accesskey="l" tabindex="1" value="Logout!" />',
'</form>',
'</div></div>'
].join('');

var preferences_content = [
'<div class="content">',
'<div class="heading">Taskbar Transparency</div>',
'<div class="body">',
'<form action="javascript: return false" name="preferences" id="preferences">',
'<input type="checkbox" name="taskbar_transparency" id="taskbar_transparency" accesskey="t" tabindex="1" />',
'</form>',
'</div></div>'
].join('');

var notepad_content = [
'<div class="content">',
'<div class="body">',
'<textarea>Hello <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] . "!"; ?></textarea>',
'<div class="buttons">',
'<a href="#" class="positive">',
'<img src="i/icons/tick.png" alt="" />',
'Save',
'</a>',
'</div>',
'</div></div>'
].join('');

var flash_name_content = [
'<div class="content">',
'<div class="body">',
'</div></div>'
].join('');

var piano_content = [
'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" height="99%" width="99%">',
'<param name="movie" value="flash/piano.swf">',
'<param name="quality" value="high">',
'<embed type="application/x-shockwave-flash" src="flash/piano.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" height="99%" width="99%"></embed>',
'</object>'
].join('');

/* end panel content */
/* begin panel variables */

var dialog_loading = new dialog('Loading','loading',false,false,false,true,50,50,100,168,'absolute',0,0,'l','t',true,'Loading...');
var user_desktop = new desktop(taskbar_start_content, taskbar_quickstart_content);
var logout = new panel('Logout','logout',false,true,false,false,200,260,400,450,'absolute',0,0,'r','t',false,logout_content);
var preferences = new panel('Preferences','preferences',false,true,false,false,200,200,400,400,'absolute',0,0,'r','b',false,preferences_content);
var notepad = new panel('Notepad','notepad',false,true,false,false,200,200,400,400,'absolute',0,0,'l','b',false,notepad_content);
var flash_name = new panel('Flash Name','flash-name',false,true,false,false,270,270,470,470,'absolute',215,80,'l','t',false,flash_name_content);
var piano = new panel('Piano','piano',false,true,false,true,200,560,400,1200,'absolute',0,0,'r','t',true,piano_content);

/* end panel variables */

<?php
} else {
?>

/* begin panel content */

var login_content = [
'<div class="content">',
'<div class="heading">Homenet Spaces OS</div>',
'<div class="body">',
'<form action="javascript: return false" name="login" id="login">',
'<table style="margin : 0 auto; margin-bottom : 10px; margin-top : 10px; width: 95%; ">',
'<tbody>',
'<tr>',
'<td class="label">',
'<label for="username">Username: </label>',
'</td>',
'<td class="input">',
'<input type="text" name="username" id="username" size="33" maxlength="20" accesskey="u" tabindex="1" value="" />',
'</td>',
'</tr>',
'<tr>',
'<td class="label">',
'<label for="password">Password: </label>',
'</td>',
'<td class="input">',
'<input type="password" name="password" id="password" size="33" maxlength="20" accesskey="p" tabindex="2" value="" />',
'</td>',
'</tr>',
'<tr>',
'<td class="label">',
'<label for="checkbox">Remember: </label>',
'</td>',
'<td class="input">',
'<input type="checkbox" name="remember" accesskey="m" tabindex="3" value="remember" />',
'<div class="buttons right">',
'<button type="submit" name="signin" id="signin" class="positive" accesskey="l" tabindex="4">',
'<img src="i/icons/tick.png" alt="" />',
'Login!',
'</button>',
'<button type="reset" name="reset" id="reset" accesskey="c" tabindex="5">',
'<img src="i/icons/textfield_key.png" alt="" />',
'Clear',
'</button>',
'<button type="button" name="register" id="signup" class="negative" accesskey="r" tabindex="6">',
'<img src="i/icons/cross.png" alt="" />',
'Register',
'</button>',
'</div>',
'</td>',
'</tr>',
'</tbody>',
'</table>',
'</form>',
'</div></div>'
].join('');

var register_content = [
'<div class="content">',
'<div class="heading">Register</div>',
'<div class="body">',
'<form action="javascript: return false" name="register" id="register">',
'<fieldset style="margin : 0 auto; width : 75%; ">',
'<legend>Login Credentials&nbsp;</legend>',
'<table style="margin-bottom : 10px; margin-top : 10px; ">',
'<tr>',
'<td class="label"><label for="username_reg">Username:</label></td>',
'<td class="input"><input type="text" name="username_reg" id="username_reg" size="26" maxlength="20" value="<?php echo $username_reg; ?>" />',
'<small class="formreminder">( You can\'t change your username after you signup )</small></td>',
'</tr>',
'<tr>',
'<td class="label"><label for="password_reg">Password:</label></td>',
'<td class="input"><input type="password" name="password_reg" id="password_reg" size="26" maxlength="20" value="" /></td>',
'</tr>',
'<tr>',
'<td class="label"><label for="password_ver_reg">Confirm Password:</label></td>',
'<td class="input"><input type="password" name="password_ver_reg" id="password_ver_reg" size="26" maxlength="20" value="" />',
'</td>',
'</tr>',
'</table>',
'</fieldset>',
'<br /><br />',
'<fieldset style="margin : 0 auto; width : 75%; ">',
'<legend>Personal Information&nbsp;</legend>',
'<table style="margin-bottom : 10px; margin-top : 10px; ">',
'<tr>',
'<td class="label"><label for="first_name">First Name:</label></td>',
'<td class="input"><input type="text" name="first_name" id="first_name" size="26" maxlength="20" value="<?php echo $first_name ?>" /></td>',
'</tr>',
'<tr>',
'<td class="label"><label for="last_name">Last Name:</label></td>',
'<td class="input"><input type="text" name="last_name" id="last_name" size="26" maxlength="20" value="<?php echo $last_name ?>" /></td>',
'</tr>',
'<tr>',
'<td class="label"><label for="email">Email:</label></td>',
'<td class="input"><input type="text" name="email" id="email" size="26" maxlength="50" value="<?php echo $email ?>" /></td>',
'</tr>',
'<tr>',
'<td class="label"><label for="gender">Gender:</label></td>',
'<td class="input">',
'<input type="radio" name="gender" id="gender" value="Male" <?php if ($gender == "Male") { echo 'checked="checked"'; } ?> /><span class="radio">Male</span>',
'<input type="radio" name="gender" id="gender" value="Female" <?php if ($gender == "Female") { echo 'checked="checked"'; } ?> /><span class="radio">Female</span>',
'</td>',
'</tr>',
'<tr>',
'<td class="label">Birth Date:</td>',
'<td class="input">',
'<select name="birth_month" id="birth_month">',
'<option value="0" <?php if ($birth_month == 0 || null) { echo 'selected="selected"'; } ?>></option>',
'<option value="1" <?php if ($birth_month == 1) { echo 'selected="selected"'; } ?>>&nbsp;January</option>',
'<option value="2" <?php if ($birth_month == 2) { echo 'selected="selected"'; } ?>>&nbsp;February</option>',
'<option value="3" <?php if ($birth_month == 3) { echo 'selected="selected"'; } ?>>&nbsp;March</option>',
'<option value="4" <?php if ($birth_month == 4) { echo 'selected="selected"'; } ?>>&nbsp;April</option>',
'<option value="5" <?php if ($birth_month == 5) { echo 'selected="selected"'; } ?>>&nbsp;May</option>',
'<option value="6" <?php if ($birth_month == 6) { echo 'selected="selected"'; } ?>>&nbsp;June</option>',
'<option value="7" <?php if ($birth_month == 7) { echo 'selected="selected"'; } ?>>&nbsp;July</option>',
'<option value="8" <?php if ($birth_month == 8) { echo 'selected="selected"'; } ?>>&nbsp;August</option>',
'<option value="9" <?php if ($birth_month == 9) { echo 'selected="selected"'; } ?>>&nbsp;September</option>',
'<option value="10" <?php if ($birth_month == 10) { echo 'selected="selected"'; } ?>>&nbsp;October</option>',
'<option value="11" <?php if ($birth_month == 11) { echo 'selected="selected"'; } ?>>&nbsp;November</option>',
'<option value="12" <?php if ($birth_month == 12) { echo 'selected="selected"'; } ?>>&nbsp;December</option>',
'</select>',
'<select name="birth_day" id="birth_day">',
'<option value="0" <?php if ($birth_day == 0 || null) { echo 'selected="selected"'; } ?>></option>',
<?php
for ($i = 1; $i <= 31; $i++) {
echo "'<option value=\"$i\""; if ($birth_day == $i) { echo "selected=\"selected\""; } echo ">&nbsp;$i</option>',\n";
}
?>
'</select>',
'<select name="birth_year" id="birth_year">',
'<option value="0" <?php if ($birth_year == 0 || null) { echo 'selected="selected"'; } ?>></option>',
<?php
for ($i = 2010; $i >= 1902; $i--) {
echo "'<option value=\"$i\""; if ($birth_year == $i) { echo "selected=\"selected\""; } echo ">&nbsp;$i</option>',\n";
}
?>
'</select>',
'</td>',
'</tr>',
'<tr>',
'<td class="label"><label for="hometown">Hometown:</label></td>',
'<td class="input"><input type="text" name="hometown" id="hometown" size="26" maxlength="50" value="<?php echo $hometown ?>" /></td>',
'</tr>',
'<tr>',
'<td class="label"><label for="community">Community:</label></td>',
'<td class="input"><input type="text" name="community" id="community" size="26" maxlength="50" value="<?php echo $community ?>" />',
'<small class="formreminder">( Current Location, School, Business, or Group )</small></td>',
'</tr>',
'<tr>',
'<td class="label"><label for="hobbies">Hobbies / Interests:</label></td>',
'<td class="input">',
'<select name="hobbies[]" id="hobbies" size="10" multiple="multiple">',
<?php
$hobbies_list = array('Biking', 'Computers', 'Cooking', 'Dancing', 'Exercise', 'Flying', 'Gaming', 'Golfing', 'Hiking', 'Hunting', 'Internet', 'Reading', 'Running', 'School', 'Singing', 'Skiing', 'Swimming', 'Traveling', 'Other than listed', 'Websites');
$hobbies = array();

foreach ($hobbies_list as $hobby) {
if (in_array($hobby, $hobbies)) {
echo "'<option value=\"" . $hobby . "\" selected=\"selected\">" . $hobby . "</option>',\n";
} else {
echo "'<option value=\"" . $hobby . "\">" . $hobby . "</option>',\n";
}
}
?>
'</select>',
'<small class="formreminder">( Hold Ctrl to select more than one )</small></td>',
'</tr>',
'</table>',
'<br /><br />',
'</fieldset>',
'<br /><br />',
'<fieldset style="margin : 0 auto; width : 75%; ">',
'<legend>Security Questions&nbsp;</legend>',
'<div style="margin : 0 auto; margin-bottom : 10px; margin-top : 10px; ">',
'<fieldset style="margin : 0 auto; width : 90%; ">',
'<legend>Question 1&nbsp;</legend>',
'<table style="margin : 0 auto; margin-bottom : 10px; margin-top : 10px; ">',
'<tr>',
'<td class="label"><label for="security_question1">Question:</label></td>',
'<td class="input">',
'<select name="security_question1" id="security_question1">',
'<option value="0" <?php if ($security_question1 == 0 || null) { echo 'selected="selected"'; } ?>>&nbsp;</option>',
'<option value="1" <?php if ($security_question1 == 1) { echo 'selected="selected"'; } ?>>&nbsp;What was your childhood nickname?</option>',
'<option value="2" <?php if ($security_question1 == 2) { echo 'selected="selected"'; } ?>>&nbsp;What was your dream job as a child?</option>',
'<option value="3" <?php if ($security_question1 == 3) { echo 'selected="selected"'; } ?>>&nbsp;What street did you live on in third grade?</option>',
'<option value="4" <?php if ($security_question1 == 4) { echo 'selected="selected"'; } ?>>&nbsp;What was the name of your first stuffed animal?</option>',
'<option value="5" <?php if ($security_question1 == 5) { echo 'selected="selected"'; } ?>>&nbsp;In what city or town did your mother and father meet?</option>',
'<option value="6" <?php if ($security_question1 == 6) { echo 'selected="selected"'; } ?>>&nbsp;What is the last name of your third grade teacher?</option>',
'<option value="7" <?php if ($security_question1 == 7) { echo 'selected="selected"'; } ?>>&nbsp;What is the middle name of your oldest child?</option>',
'<option value="8" <?php if ($security_question1 == 8) { echo 'selected="selected"'; } ?>>&nbsp;What school did you attend for sixth grade?</option>',
'<option value="9" <?php if ($security_question1 == 9) { echo 'selected="selected"'; } ?>>&nbsp;In what city did you meet your spouce/significant other?</option>',
'<option value="10" <?php if ($security_question1 == 10) { echo 'selected="selected"'; } ?>>&nbsp;What was your childhood phone number including area code? (e.g. 000-000-000)</option>',
'<option value="11" <?php if ($security_question1 == 11) { echo 'selected="selected"'; } ?>>&nbsp;What is the first name of the boy or girl you first kissed?</option>',
'<option value="12" <?php if ($security_question1 == 12) { echo 'selected="selected"'; } ?>>&nbsp;What is the name of your favorite childhood friend?</option>',
'</select>',
'</td>',
'</tr>',
'<tr>',
'<td class="label"><label for="security_answer1">Answer:</label></td>',
'<td class="input"><input type="text" name="security_answer1" id="security_answer1" size="35" maxlength="50" value="<?php echo $security_answer1; ?>" /></td>',
'</tr>',
'</table>',
'</fieldset>',
'<br />',
'<fieldset style="margin : 0 auto; width : 90%; ">',
'<legend>Question 2&nbsp;</legend>',
'<table style="margin : 0 auto; margin-bottom : 10px; margin-top : 10px; ">',
'<tr>',
'<td class="label"><label for="security_question2">Question:</label></td>',
'<td class="input">',
'<select name="security_question2" id="security_question2">',
'<option value="0" <?php if ($security_question2 == 0 || null) { echo 'selected="selected"'; } ?>>&nbsp;</option>',
'<option value="1" <?php if ($security_question2 == 1) { echo 'selected="selected"'; } ?>>&nbsp;What was your childhood nickname?</option>',
'<option value="2" <?php if ($security_question2 == 2) { echo 'selected="selected"'; } ?>>&nbsp;What was your dream job as a child?</option>',
'<option value="3" <?php if ($security_question2 == 3) { echo 'selected="selected"'; } ?>>&nbsp;What street did you live on in third grade?</option>',
'<option value="4" <?php if ($security_question2 == 4) { echo 'selected="selected"'; } ?>>&nbsp;What was the name of your first stuffed animal?</option>',
'<option value="5" <?php if ($security_question2 == 5) { echo 'selected="selected"'; } ?>>&nbsp;In what city or town did your mother and father meet?</option>',
'<option value="6" <?php if ($security_question2 == 6) { echo 'selected="selected"'; } ?>>&nbsp;What is the last name of your third grade teacher?</option>',
'<option value="7" <?php if ($security_question2 == 7) { echo 'selected="selected"'; } ?>>&nbsp;What is the middle name of your oldest child?</option>',
'<option value="8" <?php if ($security_question2 == 8) { echo 'selected="selected"'; } ?>>&nbsp;What school did you attend for sixth grade?</option>',
'<option value="9" <?php if ($security_question2 == 9) { echo 'selected="selected"'; } ?>>&nbsp;In what city did you meet your spouce/significant other?</option>',
'<option value="10" <?php if ($security_question2 == 10) { echo 'selected="selected"'; } ?>>&nbsp;What was your childhood phone number including area code? (e.g. 000-000-000)</option>',
'<option value="11" <?php if ($security_question2 == 11) { echo 'selected="selected"'; } ?>>&nbsp;What is the first name of the boy or girl you first kissed?</option>',
'<option value="12" <?php if ($security_question2 == 12) { echo 'selected="selected"'; } ?>>&nbsp;What is the name of your favorite childhood friend?</option>',
'</select>',
'</td>',
'</tr>',
'<tr>',
'<td class="label"><label for="security_answer2">Answer:</label></td>',
'<td class="input"><input type="text" name="security_answer2" id="security_answer2" size="35" maxlength="50" value="<?php echo $security_answer2; ?>" /></td>',
'</tr>',
'</table>',
'</fieldset>',
'</div>',
'<div style="margin-bottom : 10px; ">',
'<small class="formreminder">( If you ever forget your password you will need to answer these questions to get it reset )</small>',
'</div>',
'</fieldset>',
'<br /><br />',
'<fieldset style="margin : 0 auto; width : 75%; ">',
'<legend>Security Code&nbsp;</legend>',
'<table style="margin : 0 auto; margin-bottom : 10px; margin-top : 10px; ">',
'<tr>',
'<td><input type="text" name="txtsecuritycode" size="14" maxlength="7" value="" style="font-size : 18pt; height : 30px; letter-spacing : 2px; line-height : 30px; margin-right : 5px; text-align : center; " /></td>',
'<td><img name="captchaimg" alt="Security Code" src="captcha_securityimage.php" /></td>',
'<td><a onclick="javascript:updatecaptchaimg();"><img src="i/captcha/arrow_refresh.png" alt="Refresh Code" style="border-width : 0px; margin-left : 5px; margin-top : 7px; " /></a></td>',
'</tr>',
'</table>',
'<br />',
'<div>',
'<input type="submit" name="register" id="register" value="Register" />',
'</div>',
'<br />',
'</fieldset>',
'</form>',
'<script type="text/javascript">',
'document.register.username.focus();',
'</script>',
'</div></div>'
].join('');

/* end panel content */
/* begin panel variables */

var login = new panel('Login','login',false,true,true,false,200,250,400,450,'absolute',0,0,'l','t',true,login_content);
var register = new panel('Register','register',false,true,false,true,200,250,400,450,'absolute',0,0,'l','t',true,register_content);
var dialog_tryagain = new dialog('Try Again','notice',false,false,false,false,50,50,100,200,'absolute',0,0,'l','t',true,'Please Try Again!');

/* end panel variables */

<?php
}
?>

$(document).ready(function() {

<?php
if (!isset($_SESSION['logged']) || (!$_SESSION['logged'] == 1)) {
?>

login.display();
register.display();

$("input[type='text']#username").focus();
$("button[type='submit']#signin").click(function() {
if (($("input[type='text']#username").val() != "") && ($("input[type='password']#password").val() != "")) {
$("div#login").hide();
var str = $("form#login").serialize();
$.post("login.php", str, function(data) {
if (data == "Success") {
location.reload();
} else {
$("div#notice").css('opacity',1)
dialog_tryagain.display();
$("div#login").css('opacity',0).show().animate({opacity:0}, 1500).animate({opacity:1}, 1500);
$("div#notice").animate({opacity:1}, 1000).animate({opacity:0}, 1000)
$("input[type='text']#username").focus();
}
});
}
});

$(document.documentElement).keydown(function(event) {
if (event.keyCode == 13) {
if (($("input[type='text']#username").val() != "") && ($("input[type='password']#password").val() != "")) {
$("div#login").hide();
var str = $("form#login").serialize();
$.post("login.php", str, function(data) {
if (data == "Success") {
location.reload();
} else {
$("div#notice").css('opacity',1)
dialog_tryagain.display();
$("div#login").css('opacity',0).show().animate({opacity:0}, 1500).animate({opacity:1}, 1500);
$("div#notice").animate({opacity:1}, 1000).animate({opacity:0}, 1000)
$("input[type='text']#username").focus();
}
});
}
}
});

$("button[type='button']#signup").click(function() {
$("div#login").hide();
$("div#register").show();
/* $("div#register div.panel-mc").load("register.php"); */
$("div#register").addClass("fullscreen");
$("div#register").height(myHeight);
$("div#register div.panel").height(myHeight);
$("div#register div.panel-bwrap").css('height',myHeight - 30);
$("div#register div.panel-header div.tools div.maximize").addClass("restore");
$("div#register div.panel-header div.tools div.toggle").hide();
$("div#register div.panel-header div.tools div.toggle").removeClass("toggledown");
});

$("input[type='submit']#register").click(function() {
if (($("input[type='text']#username_reg").val() != "")
&& ($("input[type='password']#password_reg").val() != "")
&& ($("input[type='password']#password_ver_reg").val() != "")
&& ($("input[type='password']#password_reg").val() == $("input[type='password']#password_ver_reg").val())) {
var str = $("form#register").serialize();
$.post("register.php", str, function(data) {
$("div#register").html(data);
if (data == "Success") {
$("div#register").hide();
location.reload();
} else {
/*
$("div#notice").css('opacity',1);
dialog_tryagain.display();
$("div#login").css('opacity',0).show().animate({opacity:0}, 1500).animate({opacity:1}, 1500);
$("div#notice").animate({opacity:1}, 1000).animate({opacity:0}, 1000);
*/
}
});
} else {
alert("complete forms");
}
});

<?php
} else {
?>

/* begin initiate desktop */

dialog_loading.display();
$("div#loading").css('opacity',0).show().animate({opacity:1}, 600);
$("div#main").prepend(blackout);
user_desktop.display();
$("div#blackout").css('opacity',.5).animate({opacity:.5}, 1400).animate({opacity:0}, 1200);
$("div#loading").css('opacity',1).animate({opacity:1}, 600).animate({opacity:0}, 1000);
$("div#desktop").hide().css('opacity',0);
$("div#desktop").animate({opacity:0}, 1800).show().animate({opacity:1}, 1400);
$("div#taskbar").hide().css('opacity',0);
$("div#taskbar").animate({opacity:0}, 1800).show().animate({opacity:1}, 1400);
setTimeout('$("div#blackout").remove()', 5000);
setTimeout('$("div#loading").remove()', 5000);

/* end initiate desktop */
/* begin set desktop config */
/** begin desktop config */

$("div#desktop-view").css({'height':(myHeight - (dConfig.taskbar.height + 2))});
$("div.desktop-body").css({'height':(myHeight - (dConfig.taskbar.height + 2))});
$("div.desktop-thumb").css({'height':'auto','min-height':dConfig.desktop.thumb_height,'width':dConfig.desktop.thumb_width});

/* end desktop config **/
/** begin taskbar config */

$("div#taskbar div#panel-wrap").width(myWidth - dConfig.taskbar.start_width);
$("div#taskbar div#panel-wrap div#taskbuttons-panel").width(myWidth - (dConfig.taskbar.start_width + dConfig.taskbar.quickstart_width));
$("div#taskbar div#panel-wrap div#taskbuttons-panel div.taskbuttons-strip-wrap").width(myWidth - (dConfig.taskbar.start_width + dConfig.taskbar.quickstart_width + dConfig.taskbar.tray_width));
$("div#taskbar div#panel-wrap div#taskbuttons-panel div.taskbuttons-strip-wrap ul#tray-strip").width(myWidth - (dConfig.taskbar.start_width + dConfig.taskbar.quickstart_width + dConfig.taskbar.tray_width));
$("div#taskbar div#panel-wrap div#tray-panel").width(dConfig.taskbar.tray_width);

/* end taskbar config **/
/* end set desktop config */
/* begin autorun functions */

if (in_array('logout', dConfig.launchers.autorun)) display(logout);
if (in_array('notepad', dConfig.launchers.autorun)) display(notepad);
if (in_array('preferences', dConfig.launchers.autorun)) display(preferences);
if (in_array('flash-name', dConfig.launchers.autorun)) display(flash_name);
if (in_array('piano', dConfig.launchers.autorun)) display(piano);

/* end autorun functions */

$("input[type='submit']#logout").click(function() {
$("div#logout").hide();
var str = $("form#logout").serialize();
$.post("logout.php", str, function() {
location.reload();
});
});

$("div#flash-name div.content div.body").load("flash_name.php");

<?php
}
?>

});

$(window).load(function() {

/* begin window drag effect functions */

$("div.panel-header").mousedown(function(e) {
var mdown = new div_selection(e, 4);
if (!$(mdown.event).hasClass("tool")) {
$(mdown.div_panel()).addClass("transparent5");
$(mdown.div_panel_tool()).addClass("transparent5");
$(mdown.div_panel_tl()).css({'background-color':'#181818','border-bottom':'1px solid #99bbe8'});
if ($(mdown.div_panel()).height() == 24) {
$(mdown.div_panel_tl()).css({
'border-bottom-left-radius':'4px',
'border-bottom-right-radius':'4px',
'-moz-border-radius-bottomleft':'4px',
'-moz-border-radius-bottomright':'4px',
'-webkit-border-bottom-left-radius':'4px',
'-webkit-border-bottom-right-radius':'4px'
});
}
$(mdown.div_panel_bwrap()).hide();
}
});

$("span.panel-header-text").mousedown(function(e) {
var mdown = new div_selection(e, 5);
if (!$(mdown.event).hasClass("tool")) {
$(mdown.div_panel()).addClass("transparent5");
$(mdown.div_panel_tool()).addClass("transparent5");
$(mdown.div_panel_tl()).css({'background-color':'#181818','border-bottom':'1px solid #99bbe8'});
if ($(mdown.div_panel()).height() == 24) {
$(mdown.div_panel_tl()).css({
'border-bottom-left-radius':'4px',
'border-bottom-right-radius':'4px',
'-moz-border-radius-bottomleft':'4px',
'-moz-border-radius-bottomright':'4px',
'-webkit-border-bottom-left-radius':'4px',
'-webkit-border-bottom-right-radius':'4px'
});
}
$(mdown.div_panel_bwrap()).hide();
}
});

$("div.panel-header").mouseup(function(e) {
var mup = new div_selection(e, 4);
if (!$(mup.event).hasClass("tool")) {
$(mup.div_panel()).removeClass("transparent5");
$(mup.div_panel_tool()).removeClass("transparent5");
$(mup.div_panel_tl()).css({'background-color':'','border-bottom':'0'});
$(mup.div_panel_tl()).css({
'border-bottom-left-radius':'0px',
'border-bottom-right-radius':'0px',
'-moz-border-radius-bottomleft':'0px',
'-moz-border-radius-bottomright':'0px',
'-webkit-border-bottom-left-radius':'0px',
'-webkit-border-bottom-right-radius':'0px'
});
$(mup.div_panel_bwrap()).show();
}
});

$("span.panel-header-text").mouseup(function(e) {
var mup = new div_selection(e, 5);
if (!$(mup.event).hasClass("tool")) {
$(mup.div_panel()).removeClass("transparent5");
$(mup.div_panel_tool()).removeClass("transparent5");
$(mup.div_panel_tl()).css({'background-color':'','border-bottom':'0'});
$(mup.div_panel_tl()).css({
'border-bottom-left-radius':'0px',
'border-bottom-right-radius':'0px',
'-moz-border-radius-bottomleft':'0px',
'-moz-border-radius-bottomright':'0px',
'-webkit-border-bottom-left-radius':'0px',
'-webkit-border-bottom-right-radius':'0px'
});
$(mup.div_panel_bwrap()).show();
}
});

/* end window drag effect functions */
/* begin window tool functions */

$("div.panel-header div.tools div.close").click(function(e) {
var close = new div_selection(e, 6);
$(close.div_main()).hide();

<?php
if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) {
?>

var tbutton = "ul#taskbuttons-strip li#taskbutton-" + close.main();
$(tbutton).hide();

<?php
}
?>

});

$("div.panel-header div.tools div.maximize").toggle(function(e) {
var maximize1 = new div_selection(e, 6);
var maximize2 = maximize1.div_panel() + '-header div.tools div.maximize';
var maximize3 = maximize1.div_panel() + '-header div.tools div.toggle';
$(maximize1.div_main()).addClass("fullscreen");
$(maximize1.div_panel()).addClass("fullscreen");

<?php
if (!isset($_SESSION['logged']) || (!$_SESSION['logged'] == 1)) {
?>

$(maximize1.div_main()).height(myHeight);
$(maximize1.div_panel()).height(myHeight);

<?php
} else {
?>

$(maximize1.div_main()).height(myHeight - (dConfig.taskbar.height + 2));
$(maximize1.div_panel()).height(myHeight - (dConfig.taskbar.height + 2));

<?php
}
?>

$(maximize2).addClass("restore");
$(maximize3).hide();
$(maximize3).removeClass("toggledown");
$(maximize1.div_panel_bwrap()).css('height',myHeight - 30);

if ($(maximize1.div_panel_bwrap()).is(":hidden")) {
$(maximize1.div_panel()).animate({'height':'100%'}, 0);
$(maximize1.div_panel_bwrap()).show();
}
},
function(e) {
var restore1 = new div_selection(e, 6);
var restore2 = restore1.div_panel() + '-header div.tools div.maximize';
var restore3 = restore1.div_panel() + '-header div.tools div.tool.toggle';
$(restore1.div_main()).removeClass("fullscreen");
$(restore1.div_panel()).removeClass("fullscreen");
$(restore2).removeClass("restore");
$(restore3).show();
$(restore1.div_panel_bwrap()).height(($(restore1.div_panel()).height() - 30));
});

$("div.panel-header div.tools div.minimize").click(function(e) {
var minimize = new div_selection(e, 6);
$(minimize.div_main()).hide();
});

$("div.panel-header div.tools div.toggle").click(function(e) {
var toggle = new div_selection(e, 6);
if ($(toggle.div_panel_bwrap()).is(":hidden")) {
$(toggle.div_panel()).animate({'height':'100%'}, 0);
$(toggle.div_panel_bwrap()).show();
} else {
if (!$(toggle.div_panel()).hasClass("fullscreen")) {
$(toggle.div_panel()).animate({'height':'24px'}, 0);
$(toggle.div_panel_bwrap()).hide();
}
}
});

$("div.panel-header div.tools div.toggle").toggle(function (e) {
var toggle_arrow = new div_selection(e, 6);
if (!$(toggle_arrow.div_panel()).hasClass("fullscreen")) {
$(this).addClass("toggledown");
}
},
function () {
$(this).removeClass("toggledown");
});

/* end window tool functions */

<?php
if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) {
?>

/* begin desktop functions */

$("div.desktop-body").click(function(e) {
var target = new div_selection(e, 0);
if (target.target_class() == "desktop-body") {
$("div.desktop-body").children(".desktop-thumb-selected").removeClass("desktop-thumb-selected");
}
});

$("div.desktop-thumb").click(function(e) {
var tthumb = new div_selection(e, 0);
if (tthumb.target_class() == "thumb-image") {
tthumb = new div_selection(e, 1);
tthumb = tthumb.main().slice(6);
tdthumb = "div#thumb-" + tthumb;
$("div.desktop-body").children(".desktop-thumb-selected").removeClass("desktop-thumb-selected");
$(tdthumb).addClass("desktop-thumb-selected");
} else {
tthumb = tthumb.main().slice(6);
tdthumb = "div#thumb-" + tthumb;
$("div.desktop-body").children(".desktop-thumb-selected").removeClass("desktop-thumb-selected");
$(tdthumb).addClass("desktop-thumb-selected");
}

if (tthumb == "logout") display(logout);
if (tthumb == "notepad") display(notepad);
if (tthumb == "preferences") display(preferences);
if (tthumb == "flash-name") display(flash_name);
if (tthumb == "piano") display(piano);
});

$(document.documentElement).keydown(function(event) { // handle cursor keys
var direction = null;

if (event.keyCode == 37) { // go left
direction = "prev";
alert("left");
} else if (event.keyCode == 38) { // go up
direction = "prev";
alert("up");
} else if (event.keyCode == 39) { // go right
direction = "next";
alert("right");
} else if (event.keyCode == 40) { // go down
direction = "next";
alert("down");
}

if (direction != null) {
$("div.desktop-thumb").parent()[direction]().find('div.desktop-thumb').click();
}
});

$("div#preferences input[type='checkbox']#taskbar_transparency").toggle(function () {
$("div#taskbar").addClass("transparent8");
},
function () {
$("div#taskbar").removeClass("transparent8");
});

/* end desktop functions */
/* begin taskbar functions */

$("li.taskbutton").click(function(e) {
var tbutton = new div_selection(e, 5);
var tbutton = "div#" + tbutton.main().slice(11);

if ($(tbutton).is(":hidden")) {
$(tbutton).show();
} else {
$(tbutton).hide();
}
});

$("div#quickstart-splitbar").mousedown(function() {
var mouseX = 0, lastMouseX = 0, mOffX = 0, diffX = 0;

$("div#quickstart-splitbar").bind('mousemove', function(e) {
diffX = 0;
mouseX = e.pageX || (e.clientX + document.documentElement.scrollLeft);

if (lastMouseX == 0) {
lastMouseX = mouseX;
}

diffX = (mouseX - lastMouseX + mOffX);

if (diffX > 10) {
diffX = 10;
} else if (diffX < -10) {
diffX = -10;
}

if (((mouseX - diffX) > (dConfig.taskbar.start_width + dConfig.taskbar.quickstart_minwidth)) && ((mouseX + diffX) < (dConfig.taskbar.start_width + dConfig.taskbar.quickstart_maxwidth))) {
$("div#taskbar div#quickstart-panel").css('width',$("div#taskbar div#quickstart-panel").width() + diffX);
$("div#taskbar div#taskbuttons-panel").css('left',$("div#taskbar div#taskbuttons-panel").position().left + diffX);
$("div#taskbar div#taskbuttons-panel").css('width',$("div#taskbar div#taskbuttons-panel").width() - diffX);
$("div#taskbar div.taskbuttons-strip-wrap").css('width',$("div#taskbar div.taskbuttons-strip-wrap").width() - diffX);
lastMouseX = mouseX;
}
});
});

$("div#tray-splitbar").mousedown(function() {
var mouseX = 0, lastMouseX = 0, mOffX = 0, diffX = 0;

$("div#tray-splitbar").bind('mousemove', function(e) {
diffX = 0;
mouseX = e.pageX || (e.clientX + document.documentElement.scrollLeft);

if (lastMouseX == 0) {
lastMouseX = mouseX;
}

diffX = (mouseX - lastMouseX + mOffX);

if (diffX > 10) {
diffX = 10;
} else if (diffX < -10) {
diffX = -10;
}

if (((mouseX - diffX) > (myWidth - dConfig.taskbar.tray_maxwidth)) && ((mouseX + diffX) < (myWidth - dConfig.taskbar.tray_minwidth))) {
$("div#taskbar div#tray-panel").css('width',$("div#taskbar div#tray-panel").width() - diffX);
$("div#taskbar div.taskbuttons-strip-wrap").css('width',$("div#taskbar div.taskbuttons-strip-wrap").width() + diffX);
lastMouseX = mouseX;
}
});
});

$("div.splitbar").mouseleave(function() {
$("div.splitbar").unbind('mousemove');
var mouseX = 0, lastMouseX = 0, mOffX = 0, diffX = 0;
});

$("div.splitbar").mouseup(function() {
$("div.splitbar").unbind('mousemove');
var mouseX = 0, lastMouseX = 0, mOffX = 0, diffX = 0;
});

$("div#tray-panel div#tray-toggle").toggle(function () {
$("div.panel").addClass("transparent5");
$("div.panel div.tool").addClass("transparent5");
$("div.panel-tl").css({'background-color':'#181818','border-bottom':'1px solid #99bbe8'});
if ($("div.panel").height() == 24) {
$("div.panel-tl").css({
'border-bottom-left-radius':'4px',
'border-bottom-right-radius':'4px',
'-moz-border-radius-bottomleft':'4px',
'-moz-border-radius-bottomright':'4px',
'-webkit-border-bottom-left-radius':'4px',
'-webkit-border-bottom-right-radius':'4px'
});
}
$("div.panel-bwrap").hide();
},
function () {
$("div.panel").removeClass("transparent5");
$("div.panel div.tool").removeClass("transparent5");
$("div.panel-tl").css({'background-color':'','border-bottom':'0'});
$("div.panel-tl").css({
'border-bottom-left-radius':'0px',
'border-bottom-right-radius':'0px',
'-moz-border-radius-bottomleft':'0px',
'-moz-border-radius-bottomright':'0px',
'-webkit-border-bottom-left-radius':'0px',
'-webkit-border-bottom-right-radius':'0px'
});
$("div.panel-bwrap").show();
});

/* end taskbar functions */

<?php
}
?>

});

/* begin dragresize functions */

if (typeof addEvent != 'function') {
var addEvent = function(o,t,f,l) {
var d = 'addEventListener', n = 'on' + t, rO = o, rT = t, rF = f, rL = l;
if (o[d] && !l) return o[d](t,f,false);
if (!o._evts) o._evts = {};
if (!o._evts[t]) {
o._evts[t] = o[n] ? {b:o[n]} : {};
o[n] = new Function('e','var r = true, o = this, a = o._evts["' + t + '"], i; for (i in a) { o._f = a[i]; r = o._f(e || window.event) != false && r; o._f = null } return r;');

if (t != 'unload') addEvent(window,'unload',function() {
removeEvent(rO,rT,rF,rL);
})
}

if (!f._i) f._i = addEvent._i++;
o._evts[t][f._i] = f;
};

addEvent._i = 1;

var removeEvent = function(o,t,f,l) {
var d = 'removeEventListener';
if (o[d] && !l) return o[d](t,f,false);
if (o._evts && o._evts[t] && f._i) delete o._evts[t][f._i];
}
}

function cancelEvent(e,c) {
e.returnValue = false;

if (e.preventDefault) e.preventDefault();
if (c) {
e.cancelBubble = true;

if (e.stopPropagation) e.stopPropagation();
}
};

function DragResize(myName,config) {
var props = {
myName:myName,
enabled:true,
handles:['tl','tm','tr','ml','mr','bl','bm','br'],
isElement:null,
isHandle:null,
element:null,
handle:null,
minWidth:10,
minHeight:10,
minLeft:0,
maxLeft:9999,
minTop:0,
maxTop:9999,
zIndex:1,
mouseX:0,
mouseY:0,
lastMouseX:0,
lastMouseY:0,
mOffX:0,
mOffY:0,
elmX:0,
elmY:0,
elmW:0,
elmH:0,
allowBlur:true,
ondragfocus:null,
ondragstart:null,
ondragmove:null,
ondragend:null,
ondragblur:null
};

for (var p in props) this[p] = (typeof config[p] == 'undefined') ? props[p] : config[p];
};

DragResize.prototype.apply = function(node) {
var obj = this;

addEvent(node,'mousedown',function(e) { obj.mouseDown(e); });
addEvent(node,'mousemove',function(e) { obj.mouseMove(e); });
addEvent(node,'mouseup',function(e) { obj.mouseUp(e); })
};

DragResize.prototype.select = function(newElement) {
with(this) {
if (!document.getElementById || !enabled) return;

if (newElement && (newElement != element) && enabled) {
element = newElement;
element.style.zIndex = ++zIndex;

if (this.resizeHandleSet) this.resizeHandleSet(element,true);
elmX = parseInt(element.style.left);
elmY = parseInt(element.style.top);
elmW = element.offsetWidth;
elmH = element.offsetHeight;
if (ondragfocus) this.ondragfocus();
}}};

DragResize.prototype.deselect = function(delHandles) {
with(this) {
if (!document.getElementById || !enabled) return;
if (delHandles) {
if (ondragblur) this.ondragblur();
if (this.resizeHandleSet) this.resizeHandleSet(element,false);
element = null;
}

handle = null;
mOffX = 0;
mOffY = 0;
}};

DragResize.prototype.mouseDown = function(e) {
with(this) {
if (!document.getElementById || !enabled) return true;
var elm = e.target || e.srcElement, newElement = null, newHandle = null, hRE = new RegExp(myName + '-([trmbl]{2})','');
while(elm) {
if (elm.className) {
if (!newHandle && (hRE.test(elm.className) || isHandle(elm))) newHandle = elm;
if (isElement(elm)) {
newElement = elm;
break;
}}
elm = elm.parentNode;
}

if (element && (element != newElement) && allowBlur) deselect(true);
if (newElement && (!element || (newElement == element))) {
if (newHandle) cancelEvent(e);
select(newElement,newHandle);
handle = newHandle;

if (handle && ondragstart) this.ondragstart(hRE.test(handle.className));
}}};

DragResize.prototype.mouseMove = function(e) {
with(this) {
if (!document.getElementById || !enabled) return true;
mouseX = e.pageX || (e.clientX + document.documentElement.scrollLeft);
mouseY = e.pageY || (e.clientY + document.documentElement.scrollTop);
var diffX = (mouseX - lastMouseX + mOffX);
var diffY = (mouseY - lastMouseY + mOffY);
mOffX = mOffY = 0;
lastMouseX = mouseX;
lastMouseY = mouseY;
if (!handle) return true;
var isResize = false;
if (this.resizeHandleDrag && this.resizeHandleDrag(diffX,diffY)) {
isResize = true;
} else {
var dX = diffX, dY = diffY;
if ((elmX + dX) < minLeft) mOffX = (dX - (diffX = minLeft - elmX));
else if ((elmX + elmW + dX) > maxLeft) mOffX = (dX - (diffX = (maxLeft - elmX - elmW)));
if ((elmY + dY) < minTop) mOffY = (dY - (diffY = (minTop - elmY)));
else if ((elmY + elmH + dY) > maxTop) mOffY = (dY - (diffY = (maxTop - elmY - elmH)));
elmX += diffX;
elmY += diffY;
}

with(element.style) {
left = elmX + 'px';
width = elmW + 'px';
top = elmY + 'px';
height = elmH + 'px';
}

var new_element = 'div#' + $(element).attr('id') + ' div.panel-bwrap';
$(new_element).css('height', elmH - 30);

if (window.opera && document.documentElement) {
var oDF = document.getElementById('op-drag-fix');
if (!oDF) {
var oDF = document.createElement('input');
oDF.id = 'op-drag-fix';
oDF.style.display = 'none';
document.body.appendChild(oDF);
}
oDF.focus();
}

if (ondragmove) this.ondragmove(isResize);
cancelEvent(e);
}};

DragResize.prototype.mouseUp = function(e) {
with(this) {
if (!document.getElementById || !enabled) return;
var hRE = new RegExp(myName + '-([trmbl]{2})','');
if (handle && ondragend) this.ondragend(hRE.test(handle.className));
deselect(false);
}};

DragResize.prototype.resizeHandleSet = function(elm,show) {
with(this) {
if (!elm._handle_tr) {
for (var h = 0; h < handles.length; h++) {
var hDiv = document.createElement('div');
hDiv.className = myName + ' ' + myName + '-' + handles[h];
elm['_handle_' + handles[h]] = elm.appendChild(hDiv);
}}

for (var h = 0; h < handles.length; h++) {
elm['_handle_' + handles[h]].style.visibility = show ? 'inherit' : 'hidden';
}}};

DragResize.prototype.resizeHandleDrag = function(diffX,diffY) {
with(this) {
var hClass = handle && handle.className && handle.className.match(new RegExp(myName + '-([tmblr]{2})')) ? RegExp.$1 : '';
var dY = diffY, dX = diffX, processed = false;
if (hClass.indexOf('t') >= 0) {
rs = 1;

if ((elmH - dY) < minHeight) mOffY = (dY - (diffY = elmH - minHeight));
else if ((elmY + dY) < minTop) mOffY = (dY - (diffY = minTop - elmY));
elmY += diffY;
elmH -= diffY;
processed = true;
}

if (hClass.indexOf('b') >= 0) {
rs = 1;

if ((elmH + dY) < minHeight) mOffY = (dY - (diffY = (minHeight - elmH)));
else if ((elmY + elmH + dY) > maxTop) mOffY = (dY - (diffY = (maxTop - elmY - elmH)));
elmH += diffY;
processed = true;
}

if (hClass.indexOf('l') >= 0) {
rs = 1;

if ((elmW - dX) < minWidth) mOffX = (dX - (diffX = (elmW - minWidth)));
else if ((elmX + dX) < minLeft) mOffX = (dX - (diffX = (minLeft - elmX)));
elmX += diffX;
elmW -= diffX;
processed = true;
}

if (hClass.indexOf('r') >= 0) {
rs = 1;

if (elmW + dX < minWidth) mOffX = (dX - (diffX = minWidth - elmW));
else if ((elmX + elmW + dX) > maxLeft) mOffX = (dX - (diffX = maxLeft - elmX - elmW));
elmW += diffX;
processed = true;
}
return processed;
}};

var dragresize = new DragResize('dragresize', { minWidth: 250, minHeight: 150, minLeft: 0, maxLeft: myWidth, minTop: 0, maxTop: <?php if ($_SESSION['logged'] == 1) { ?> (myHeight - (dConfig.taskbar.height + 2)) <?php } else { echo "myHeight"; } ?>});

dragresize.isElement = function(elm) {
if (elm.className && elm.className.indexOf('drsElement') > -1) return true;
};

dragresize.isHandle = function(elm) {
if (elm.className && elm.className.indexOf('drsMoveHandle') > -1) return true;
};

dragresize.ondragfocus = function() { };
dragresize.ondragstart = function(isResize) { };
dragresize.ondragmove = function(isResize) { };
dragresize.ondragend = function(isResize) { };
dragresize.ondragblur = function() { };

dragresize.apply(document);

/* end dragresize functions */