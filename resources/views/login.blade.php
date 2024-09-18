<body>
    <form action="{{route('login')}}" method="post">
        @csrf
        <header>End-to-End Encryption!</header>
        
        <label class="checkbox-wrapper">
        <input type="checkbox" name="new" value="1">
        <span class="label">New</span>
        </label>
        
        <h1>Notice Board System</h1>
        <h2>Login</h2><br>
    
        @if($data)
        <span style="color: red;font-family: Comic Sans MS;font-size: x-small;" >{{$data}}</span>
        @endif

        <div class="input-wrapper">
            <input type="text" name="username" placeholder="Username" value="{{old('username')}}"><br>
            <span style="color: red;font-family: Comic Sans MS;font-size: x-small;" >@error('username'){{$message}}@enderror</span><br>
            <input type="password" name="password" placeholder="Password"><br>
            <span style="color: red;font-family: Comic Sans MS;font-size: x-small;" >@error('password'){{$message}}@enderror</span><br>
            <button type="submit">Login</button>
        </div>

        <a href="{{route('admin_signup')}}" method="get">Sign up as Admin</a>
    </form>

</body>

<style>
    body{
        background-color: #09143C;
        text-align: center;
        align-self: center;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 80vh;
        max-width: 400px;
        margin: 0 auto;
    }
    form{
        margin-top: 10em;
        min-width: 200px;
        background-color: #09143C;
        padding: 10px;
        text-align: center;
        border: 3px solid lavender;  
        outline: 3px solid goldenrod;  
        border-radius: 12px;  
        font-size: 20px;  
        font-weight: bold;  
        outline-offset: 0.5em; 
    }
    input{
        background-color: #09143C;
        color: gold;
        border-color: gold;
        width: 90%;
        padding: 15px;
        margin-top: 10px;
    }
    button{
        width: 90%;
        padding: 10px;
        margin-top: 20px;
        background-color: goldenrod;
        color: #09143C;
        margin-bottom: 3em;
    }
    button:hover{
        background-color: lavender;
        cursor: pointer;
    }
    h1{
        color: goldenrod;
    }
    h2{
        color: gold;
        font-size: large;

    }
    header{
        color: lavender;
        font-size: x-small;
    }
    input[type="checkbox"]{
        width: 1em;
        height: 1rem;
        accent-color: goldenrod;
        cursor: pointer;
        margin-right: 90%;
    }
    .label{
        color: gold;
        align-self: left;
        cursor: pointer;
        font-size: small;
        margin-right: 90%;
    }
    a{
      color: lavender;
      font-size: small;
      cursor: pointer;
    }
    a:hover{
        color: gold;
    }
</style>