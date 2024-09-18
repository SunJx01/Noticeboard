<div class="content">
    <div class="header">
        
        <h3>
            YOU ARE SIGNED IN AS <br>
            <?php echo(session('name')); ?>
        </h3>
        
        <img src="http://127.0.0.1:8000/uploads/logo/logo.png" alt="logo" />
        <a href="{{route('dashboardAdmin')}}"><h1>Notice Board</h1></a>
    </div>
    <div class="nav-button">
        @foreach($nav_btn as $item)
        <a href="{{ route('noticepages', ['group_name' => $item->group_name]) }}">{{$item->group_name}}</a><br><br>
        @endforeach
    </div>
    <div class="footer">
        <a href="{{route('logout')}}">LOGOUT</a><br>
    </div>
</div>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html, body {
        height: 100vh;
        font-family: Arial, sans-serif;
    }

    .content {
        background-color: #09143C;
        width: 17%; 
        height: 100vh; 
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start; 
        align-items: center; 
        border: 0.5px solid goldenrod;
        border-radius: 1px;
    }

    img {
        width: 100%; 
        max-width: 100%; 
        height: auto; 
        margin-bottom: 20px;
    }

    h1 {
        text-align: center;
        color: goldenrod;
        font-size: 1.5rem;
        margin-bottom: 20px;
        text-decoration: none;
    }
    h3{
        color: lightgoldenrodyellow;
        font-size: xx-small;
        font-family: cursive;
        text-align: center;  
    }

    .nav-button {
        margin-bottom: 20px;
        color: white;
        font-size: 1rem;
        overflow: auto;
    }

    .footer {
        margin-top: auto;
        text-align: center;
        color: white;
    }
    .nav-button a{
        color: lightgoldenrodyellow;
        margin: 0 10px;
        text-decoration: none;
        font-family: cursive;
    }

    .nav-button a:hover{
        color: lavender;
        text-decoration: underline;
    }

    .footer a {
        color: goldenrod;
        margin: 0 10px;
        text-decoration: none;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    .footer a:hover {
        text-decoration: underline;
        color: lavender;
    }
    .header a{
        text-decoration: none;
    }
    ::-webkit-scrollbar {
        width: 1px;
    }

    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 1px;
    }

    ::-webkit-scrollbar-thumb {
        background: goldenrod;
        border-radius: 1px;
    }
</style>
