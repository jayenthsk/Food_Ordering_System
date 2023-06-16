<style media="screen">
header{
    background-color: #000000;
    padding: 20px;
  }

  body{
    background-image: url("../images/bg.jpg");
  }

  ul {
    list-style-type: none;
    margin: 7px;
    overflow: hidden;
    background-color: #000000;
    width: 100%;
  }

  li {
    float: left;
  }

  li a {
    display: block;
    color: #FFFFFF;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
  }

  li a:hover {
    background-color: #b30000;
  }
  li a:active {
    background-color: #b30000;
    color: #000000;
  }

  * {box-sizing: border-box;}
  body {font-family: Verdana, sans-serif;}
  .mySlides {display: none;}
  img {vertical-align: middle;}

  .slideshow-container {
    max-width: 1000px;
    padding: 7px;
  }

  .text {
    color: #000000;
    font-size: 15px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
  }

  .numbertext {
    color: #000000;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
  }

  .dot {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
  }

  .active {
    background-color: #b30000;
  }

  .fade {
    -webkit-animation-name: fade;
    -webkit-animation-duration: 1.5s;
    animation-name: fade;
    animation-duration: 1.5s;
  }

  @-webkit-keyframes fade {
    from {opacity: .4}
    to {opacity: 1}
  }

  @keyframes fade {
    from {opacity: .4}
    to {opacity: 1}
  }

h3{
  font-family: sans-serif;
  font-weight: bolder;
}
h4{
  font-family: sans-serif;
  font-weight: bold;
}

.b{
  float: left;
  margin: 8px;
}

#myBtn {
  display: none;
  float: right;
  z-index: 1;
  border: 3px solid #000000;
  outline: none;
  background-color: #b30000;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 10px;
  font-size: 18px;
}

#myBtn:hover {
  background-color: #FFFFFF;
  border: 3px solid #000000;
}


fieldset{
  background-color: #FFFFFF;
  border: 4px solid #000000;
  color: #000000;
  text-align: center;
}

label{
  color: #000000;
  font-family: sans-serif;
  font-weight: bold;
}

input[type=text]{
  background-color: #FFFFFF;
  color: #000000;
  border: 3px solid #b30000;
  font-family: sans-serif;
  font-weight: bold;
  padding: 7px;
  margin: 8px;
}

.formtitle{
  color: #FFFFFF;
  font-size: 25px;
  font-family: sans-serif;
  font-weight: bold;
  margin: 8px;
  background-color: #b30000;
  padding: 7px;
}

.foodbox{
  border: 2px solid #000000;
  margin: 10px;
  padding: 5px;
  width: 300px;
  float: left;
  background-color: #FFFFFF;
  transition: transform .2s;
}

.foodbox:hover{
  border: 2px solid #000000;
  margin: 10px;
  padding: 5px;
  width: 300px;
  float: left;
  background-color: #b30000;
  color: #FFFFFF;
  transform: scale(1.05);
}

.login_header{
  padding: 8px;
  margin: 5px;
  color: #FFFFFF;
  background-color: #000000;
  font-family: Verdana, sans-serif;
  float: left;
  width: 98%;
}

.logout_button{
  float: right;
  padding: 5px;
  background-color: #b30000;
  color: #FFFFFF;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 15px;
  font-weight: bold;
  font-family: Verdana, sans-serif;
}

.logout_button:hover{
  transition-duration: 0.3s;
  float: right;
  padding: 5px;
  background-color: #FFFFFF;
  color: #000000;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 15px;
  font-weight: bold;
  border: 3px solid #b30000;
  font-family: Verdana, sans-serif;
  cursor: pointer;
}

.logout{
  float: right;
}

input[type=submit]{
  padding: 5px;
  background-color: #b30000;
  color: #FFFFFF;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 15px;
  font-weight: bold;
  font-family: Verdana, sans-serif;
}

input[type=submit]:hover{
  padding: 5px;
  background-color: #FFFFFF;
  color: #000000;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 15px;
  font-weight: bold;
  font-family: Verdana, sans-serif;
  border: 3px solid #b30000;
  cursor: pointer;
}

input[type=password]{
  background-color: #FFFFFF;
  color: #000000;
  border: 3px solid #b30000;
  font-family: sans-serif;
  font-weight: bold;
  padding: 7px;
  margin: 8px;
}


footer{
  color: #FFFFFF;
  background-color: #000000;
  font-size: 10px;
  font-family: sans-serif;
  float: bottom;
  padding: 15px;
}

.footercontent{
  color: #FFFFFF;
  background-color: #000000;
  font-size: 12px;
  font-family: sans-serif;
  float: bottom;
  padding: 7px;
  margin: 5px;
}

#cart {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#cart td, #cart th {
  border: 1px solid #ddd;
  padding: 8px;
}

#cart tr:nth-child(even){background-color: #FFFFFF;}

#cart tr:hover {background-color: #ddd;}

#cart th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #b30000;
  color: #FFFFFF;
}

#user {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#user td, #user th {
  border: 1px solid #ddd;
  padding: 8px;
}

#user tr:nth-child(even){background-color: #FFFFFF;}

#user tr:hover {background-color: #ddd;}

#user th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #b30000;
  color: #FFFFFF;
}

#order {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#order td, #order th {
  border: 1px solid #ddd;
  padding: 8px;
}

#order tr:nth-child(even){background-color: #FFFFFF;}

#order tr:hover {background-color: #ddd;}

#order th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #b30000;
  color: #FFFFFF;
}

.privacybox{
  border: 3px solid #000000;
  background-color: #FFFFFF;
}

.privacytitle{
  font-family: Verdana, sans-serif;
  font-weight: bold;
  color: #FFFFFF;
  background-color: #b30000;
  padding: 10px;
}

.privacycontent{
  font-family: Verdana, sans-serif;
  font-weight: normal;
  color: #000000;
  padding: 10px;
}

.footerprivacy:link{
  color: #FFFFFF;
  text-decoration: underline;
}

.footerprivacy:visited{
  color: #FFFFFF;
  text-decoration: underline;
}

.footerprivacy:hover{
  color: #FFFFFF;
  text-decoration: underline;
}

.footerprivacy:active{
  color: #FFFFFF;
  text-decoration: underline;
}

.logname{
  color: #FFFFFF;
  text-decoration: none;
}

.logname:hover{
  color: #FFFFFF;
  text-decoration: none;
}

.logname:visited{
  color: #FFFFFF;
  text-decoration: none;
}

input[type=month]{
  background-color: #FFFFFF;
  color: #000000;
  border: 3px solid #b30000;
  font-family: sans-serif;
  font-weight: bold;
  padding: 7px;
  margin: 8px;
}

#review {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#review td, #review th {
  border: 1px solid #ddd;
  padding: 8px;
}

#review tr:nth-child(even){background-color: #FFFFFF;}

#review tr:hover {background-color: #ddd;}

#review th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #b30000;
  color: #FFFFFF;
}

.logo{
  float: right;
}
</style>
