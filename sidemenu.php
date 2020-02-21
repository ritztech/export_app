<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8" />
        <title></title>

    </head>
    <body>
    <style>
    
    #nav {
    
}
#nav, #nav ul {
    list-style:none;
    padding:0;
    width:150px;
}
#nav ul {
    position:relative;
    z-index:-1;
}
#nav li {
    position:relative;
    z-index:100;
}
#nav ul li {
    margin-top:-23px;

    -moz-transition:  0.4s linear 0.4s;
    -ms-transition: 0.4s linear 0.4s;
    -o-transition: 0.4s linear 0.4s;
    -webkit-transition: 0.4s linear 0.4s;
    transition: 0.4s linear 0.4s;
}
#nav li a {
    background-color:#fffff0;
    color:#000;
    display:block;
    font-size:14px;
    font-weight:normal;
    line-height:28px;
    outline:0;
    padding-left:15px;
    text-decoration:none;
}
#nav li a.sub {
  
}

#nav li a:hover {
    background-color:#fffff0;
}
#nav ul li a {
    background-color:#fffff0;
    border-bottom:1px solid #ccc;
    color:#000;
    font-size:14px;
    line-height:22px;
}
#nav ul li a:hover {
    background-color:#fffff0;
    color:#444;
}
#nav ul li a img {
    background: url("../images/bulb.png") no-repeat;
    border-width:0px;
    height:16px;
    line-height:22px;
    margin-right:5px;
    vertical-align:middle;
    width:16px;
}
#nav ul li:nth-child(odd) a img {
    background:url("../images/bulb2.png") no-repeat;
}
#nav a.sub:focus {
    background:#bcbdc1;
    outline:0;
}
#nav a:focus ~ ul li {
    margin-top:0;

    -moz-transition:  0.4s linear;
    -ms-transition: 0.4s linear;
    -o-transition: 0.4s linears;
    -webkit-transition: 0.4s linears;
    transition: 0.4s linear;
}
#nav a:focus + img, #nav a:active + img {
    display:block;
}
#nav a.sub:active {
    background:#bcbdc1;
    outline:0;
}
#nav a:active ~ ul li {
    margin-top:0;
}
#nav ul:hover li {
    margin-top:0;
}
    </style>
            <ul id="nav">
                <li><a href="#"> Home</a></li>
                <li><a href="#" class="sub">Master Entry</a><img src="images/up.gif" alt="" />
                    
                </li>
                <li><a href="#" >Transaction Entry</a>
                    <ul>
                     <li><a href="#">Purchase Details</a>
                      <ul>
                        <li><a href="#">Link A5</a></li>
                        <li><a href="#">Link A6</a></li>
                       
                    </ul>
                     </li> 
                        <li><a href="#">Sales Details</a>
                        <ul>
                        <li><a href="#">Link A5</a></li>
                        <li><a href="#">Link A6</a></li>
                       
                    </ul></li>                        
                        <li><a href="#">Mandi Stautoruy</a>
                         <ul>
                        <li><a href="#">Link A11</a></li>
                        <li><a href="#">Link A12</a></li>
                        <li><a href="#">Link A13</a></li>
                       
                    </ul>
                        </li>
                        <li><a href="#">Reciepts/Payment</a>
                         <ul>
                        <li><a href="#">Link A7</a></li>
                        <li><a href="#">Link A8</a></li>
                       
                    </ul></li>                        
                        <li><a href="#">DEBIT/CREDIT</a>
                         <ul>
                        <li><a href="#">Link A9</a></li>
                        <li><a href="#">Link A10</a></li>
                        <li><a href="#">Link A14</a></li>
                        <li><a href="#">Link A15</a></li>
                        
                    </ul></li>
                       
                    </ul>
                </li>
                
                <li><a href="#">Report</a>
                <ul>
                        <li><a href="#">Stock in out Report</a></li>
                        <li><a href="#">Loding report</a></li>
                        <li><a href="#">Mandi Statutiory Report</a></li>
                        <li><a href="#">Fund Details</a></li>
                        <li><a href="#">Expenses Details</a></li>
                    </ul>
                </li>
                <li><a href="#">Query/Web Master</a></li>
            </ul>

        
       
    </body>
</html>