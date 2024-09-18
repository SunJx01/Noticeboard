<body>
    <form action="{{route('verify_admin')}}" method="post">
    @csrf
        <header>End-to-End Encryption!</header>

        <h1>Messaging System</h1>
        <h2>Admin Signup</h2>

        <div class="input-wrapper">
            <input type="text" name="username" placeholder="Username" value="{{old('username')}}" ><br>
            <span style="color: red;font-family: Comic Sans MS;font-size: x-small;" >@error('username'){{$message}}@enderror</span><br>
            <input type="email" name="email" placeholder="Email" value="{{old('email')}}" ><br>
            <span style="color: red;font-family: Comic Sans MS;font-size: x-small;" >@error('email'){{$message}}@enderror</span><br>
            <input type="password" name="password" placeholder="Password"><br>
            <span style="color: red;font-family: Comic Sans MS;font-size: x-small;" >@error('password'){{$message}}@enderror</span><br>
            <input type="password" name="password_confirmation" placeholder="Confirm Password"><br>
            <span style="color: red;font-family: Comic Sans MS;font-size: x-small;" >@error('confirm_password'){{$message}}@enderror</span><br>

            <button type="submit">Signup</button>
        </div>

        <a href="{{route('login_form')}}" method="get">Back to Login</a>

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
    a{
      color: lavender;
      font-size: small;
    }
    a:hover{
        color: gold;
        cursor: pointer;

    }
</style>