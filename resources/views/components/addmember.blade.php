<div class="addmember">
    
    <div class="addmember-btn">
        <button type="button" id="toggleFormBtn">Add Member</button>
    </div>

    <form action="{{route('addmember')}}" method="post" id="addmemberForm" style="display: none;">
    @csrf
        <h8>Add Member</h8><br><br>
        <div class="input-field">
            <input type="hidden" name="grp" value="{{$group_name}}">
            <input type="text" name="username" placeholder="Enter username" multiple>
            <span style="color: red;font-family: Comic Sans MS;font-size: x-small;" >@error('addmember')('username doesn't exists!')@enderror</span><br>
        </div><br>
        <div class = "new-add">
            <button type="submit">Add</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('toggleFormBtn').addEventListener('click', function() {
        var form = document.getElementById('addmemberForm');
        if (form.style.display === 'none') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    });
</script>

<style>
    form{
        background-color: #09143C;
        padding: 20px;
        width: 95%;
        float: right;
        border: 4px solid goldenrod;
        border-radius: 20px;
        margin: 10px;
    }
    .addmember button{
        background-color: lightgoldenrodyellow;
        color: #09143C;
        padding: 5px;
        cursor: pointer;
        border: 1.5px solid lightgoldenrodyellow;
        margin: 5px;
        float: right;
        border-radius: 10px;
    }
    h8{
        color: lightgoldenrodyellow;
        font-size: medium;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 5px;
    }
    .input-field input{
        background-color: lightgoldenrodyellow;
        padding: 5px;
        border-radius: 5px;
        border: 1px solid gold;
        width: 100%;
        float: right;
    }
    .addmember button:hover{
        background-color: lavender;
        color: #09143C;
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
    .addmember-btn button{
        background-color: lightgoldenrodyellow;
        width: fit-content;
        padding: 10px;
        border-radius: 7.5px;
        border: 3px solid goldenrod;
        margin-left: 90%;
        cursor: pointer;
    }
    .addmember-btn button:hover{
        background-color: lavender;
    }

</style>
