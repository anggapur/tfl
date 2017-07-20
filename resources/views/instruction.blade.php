<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                padding: 5px;
                
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            table { 
                border-spacing: 0;
                border-collapse: collapse;
            }
            table td, table th
            {
                padding:5px;
            }
            table td
            {
                font-weight: 600;
            }
            p
            {
                  font-family: sans-serif;
            }
            hr
            {
                margin-top: 30px;
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    <ul>
        <li><a href="#products"> Products </a></li>
        <li><a href="#products-detail"> Products Detail</a></li>
        <li><a href="#categories"> Categories</a></li>
        <li><a href="#productbycategories"> Product list by Categories</a></li>
        <li><a href="#sliders"> Sliders</a></li>
        <li><a href="#carts"> Carts</a></li>
        <li><a href="#carts-create"> Carts-create</a></li>
        <li><a href="#carts-delete"> Carts-delete</a></li>
        <li><a href="#carts-update"> Carts-update</a></li>
        <li><a href="#login"> login</a></li>
    </ul>
    <!-- products -->
       <div id="products">
            <h3>https://tfl.000webhostapp.com/products</h3>
            <p>Desc :  Get Products List , you can search products in here</p>
            <table border="1">
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Description</th>
                        <th>Parameter Type</th>
                        <th>Specification</th>
                    </tr>
                </thead>  
                <tbody>
                    <tr>
                        <td>user-key</td>
                        <td>User Key Value</td>
                        <td>header</td>
                        <td>required</td>
                    </tr>
                    <tr>
                        <td>data_per_page</td>
                        <td>Data Shown per page, default : 10</td>
                        <td>GET</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>page</td>
                        <td>Data Shown per page, default : 1</td>
                        <td>GET</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>order</td>
                        <td>Order method can asc or desc, default : asc</td>
                        <td>GET</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>sort</td>
                        <td>Sort by the column name, default : product.id</td>
                        <td>GET</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>search</td>
                        <td>search value of product name and category name</td>
                        <td>GET</td>
                        <td>-</td>
                    </tr>                    
                </tbody>  
            </table>
       </div> 
       <!-- end products -->
       <!-- products detail-->
       <hr>
       <div id="products-detail">
            <h3>https://tfl.000webhostapp.com/products/[product.id]</h3>
            <p>Desc :  Get Products Detail</p>
            <p>example : https://tfl.000webhostapp.com/products/1</p>
            <table border="1">
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Description</th>
                        <th>Parameter Type</th>
                        <th>Specification</th>
                    </tr>
                </thead>  
                <tbody>
                    <tr>
                        <td>user-key</td>
                        <td>User Key Value</td>
                        <td>header</td>
                        <td>required</td>
                    </tr>
                    <tr>
                        <td>[product.id]</td>
                        <td>Value of product id</td>
                        <td>GET</td>
                        <td>-</td>
                    </tr>
                   
                </tbody>  
            </table>
       </div> 
       <!-- end products detail-->
       <hr>
       <!-- categories -->
       <div id="categories">
            <h3>https://tfl.000webhostapp.com/categories</h3>
            <p>Desc :  Get categories and his child/sub category</p>
            <table border="1">
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Description</th>
                        <th>Parameter Type</th>
                        <th>Specification</th>
                    </tr>
                </thead>  
                <tbody>
                    <tr>
                        <td>user-key</td>
                        <td>User Key Value</td>
                        <td>header</td>
                        <td>required</td>
                    </tr>                    
                    <tr>
                        <td>order</td>
                        <td>Order method can asc or desc, default : asc</td>
                        <td>GET</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>sort</td>
                        <td>Sort by the column name, default : category_id</td>
                        <td>GET</td>
                        <td>-</td>
                    </tr>
                                    
                </tbody>  
            </table>
       </div> 
       <!-- categpries -->
       <hr>
       <!-- categories detail -->
       <div id="productbycategories">
            <h3>https://tfl.000webhostapp.com/products/[category_id]</h3>
            <p>Desc :  Get List  Products by Their Category</p>
            <table border="1">
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Description</th>
                        <th>Parameter Type</th>
                        <th>Specification</th>
                    </tr>
                </thead>  
                <tbody>
                    <tr>
                        <td>user-key</td>
                        <td>User Key Value</td>
                        <td>header</td>
                        <td>required</td>
                    </tr>
                    <tr>
                        <td>data_per_page</td>
                        <td>Data Shown per page, default : 10</td>
                        <td>GET</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>page</td>
                        <td>Data Shown per page, default : 1</td>
                        <td>GET</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>order</td>
                        <td>Order method can asc or desc, default : asc</td>
                        <td>GET</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>sort</td>
                        <td>Sort by the column name, default : product.id</td>
                        <td>GET</td>
                        <td>-</td>
                    </tr>
                                
                </tbody>  
            </table>
       </div> 
       <!-- end slider -->
       <hr>
       <!-- Slider -->
       <div id="sliders">
            <h3>https://tfl.000webhostapp.com/sliders</h3>
            <p>Desc :  Get List Slider</p>
            <table border="1">
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Description</th>
                        <th>Parameter Type</th>
                        <th>Specification</th>
                    </tr>
                </thead>  
                <tbody>
                    <tr>
                        <td>user-key</td>
                        <td>User Key Value</td>
                        <td>header</td>
                        <td>required</td>
                    </tr>
                    <tr>
                        <td>state</td>
                        <td>Show data by state indicator<br>
                                https://tfl.000webhostapp.com/sliders = all Data<br>
                                https://tfl.000webhostapp.com/sliders?state=1 = data with state 1 (active)<br>
                                https://tfl.000webhostapp.com/sliders?state=0 = data with state 0 (inactive)<br>
                        </td>
                        <td>GET</td>
                        <td>-</td>
                    </tr>
                </tbody>  
            </table>
       </div> 
       <!-- end slider -->
       <hr>
       <!-- carts -->
       <div id="carts">
            <h3>https://tfl.000webhostapp.com/carts/[user_id]</h3>
            <p>Desc :  Get list product that in customer cart, find by customer (user) id</p>
            <p>Example : https://tfl.000webhostapp.com/carts/1  , you will get list products of customer with user_id value is 1</p>
            <table border="1">
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Description</th>
                        <th>Parameter Type</th>
                        <th>Specification</th>
                    </tr>
                </thead>  
                <tbody>
                    <tr>
                        <td>user-key</td>
                        <td>User Key Value</td>
                        <td>header</td>
                        <td>required</td>
                    </tr>
                    <tr>
                        <td>user_id</td>
                        <td>user/customer id</td>
                        <td>GET</td>
                        <td>required</td>
                    </tr>
                                    
                </tbody>  
            </table>
       </div> 
       <!-- end carts -->
        <hr>
       <!-- carts create -->
       <div id="carts-create">
            <h3>https://tfl.000webhostapp.com/carts</h3>
            <p>Desc :  To Store or add product to customer cart by send user_id, product_id and qty</p>
            <p>Example : Try to use postman</p>
            <table border="1">
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Description</th>
                        <th>Parameter Type</th>
                        <th>Specification</th>
                    </tr>
                </thead>  
                <tbody>
                    <tr>
                        <td>user-key</td>
                        <td>User Key Value</td>
                        <td>header</td>
                        <td>required</td>
                    </tr>
                    <tr>
                        <td>user_id</td>
                        <td>user/customer id</td>
                        <td>POST</td>
                        <td>required</td>
                    </tr>
                    <tr>
                        <td>product_id</td>
                        <td>product id value</td>
                        <td>POST</td>
                        <td>required</td>
                    </tr>
                     <tr>
                        <td>qty</td>
                        <td>quantity value</td>
                        <td>POST</td>
                        <td>required</td>
                    </tr>
                                    
                </tbody>  
            </table>
       </div> 
       <!-- end carts create-->
       <hr>
       <!-- carts delete -->
       <div id="carts-delete">
            <h3>https://tfl.000webhostapp.com/carts/[cart_id]</h3>
            <p>Desc :  To delete product from customer cart  </p>
            <p>Example : Try to use postman</p>
            <table border="1">
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Description</th>
                        <th>Parameter Type</th>
                        <th>Specification</th>
                    </tr>
                </thead>  
                <tbody>
                    <tr>
                        <td>user-key</td>
                        <td>User Key Value</td>
                        <td>header</td>
                        <td>required</td>
                    </tr>
                    <tr>
                        <td>cart_id</td>
                        <td>every product on customer cart have unique cart_id </td>
                        <td>GET</td>
                        <td>required</td>
                    </tr>
                    <tr>
                        <td>_method</td>
                        <td>value must <b> DELETE</b></td>
                        <td>POST</td>
                        <td>required</td>
                    </tr>                    
                                
                </tbody>  
            </table>
       </div> 
       <!-- end carts delete -->
       <hr>
       <!-- carts update -->
       <div id="carts-update">
            <h3>https://tfl.000webhostapp.com/carts/[cart_id]</h3>
            <p>Desc :  To update quantity product from customer cart  </p>
            <p>Example : Try to use postman</p>
            <table border="1">
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Description</th>
                        <th>Parameter Type</th>
                        <th>Specification</th>
                    </tr>
                </thead>  
                <tbody>
                    <tr>
                        <td>user-key</td>
                        <td>User Key Value</td>
                        <td>header</td>
                        <td>required</td>
                    </tr>
                    <tr>
                        <td>cart_id</td>
                        <td>every product on customer cart have unique cart_id </td>
                        <td>GET</td>
                        <td>required</td>
                    </tr>
                    <tr>
                        <td>_method</td>
                        <td>value must <b> PATCH</b></td>
                        <td>POST</td>
                        <td>required</td>
                    </tr>  
                     <tr>
                        <td>qty</td>
                        <td>quantity value</td>
                        <td>POST</td>
                        <td>required</td>
                    </tr>                    
                                               
                                
                </tbody>  
            </table>
       </div> 
       <!-- end carts update -->
       <hr>
        <!-- login -->
       <div id="login">
            <h3>https://tfl.000webhostapp.com/tfl/login/check</h3>
            <p>Desc :  send username/email and password and get data if user exists  </p>
            <p>Example : Try to use postman</p>
            <table border="1">
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Description</th>
                        <th>Parameter Type</th>
                        <th>Specification</th>
                    </tr>
                </thead>  
                <tbody>
                    <tr>
                        <td>user-key</td>
                        <td>User Key Value</td>
                        <td>header</td>
                        <td>required</td>
                    </tr>
                    <tr>
                        <td>email</td>
                        <td>this value can contain email or username but the index must named email</td>
                        <td>POST</td>
                        <td>required</td>
                    </tr>
                    <tr>
                        <td>password</td>
                        <td>value of password</td>
                        <td>POST</td>
                        <td>required</td>
                    </tr>  
                                     
                                               
                                
                </tbody>  
            </table>
       </div> 
       <!-- login -->
       <hr>
    </body>
</html>
