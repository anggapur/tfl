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
    <!-- products -->
       <div>
            <h3>https://tfl.000webhostapp.com/products</h3>
            <p>Desc :  Get Products List</p>
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
       <div>
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
       <div>
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
       <div>
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
       <!-- end products -->
    </body>
</html>
