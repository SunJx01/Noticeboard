<div class="new-group">
    
    <div class="new-grp-btn">
        <button type="button" id="toggleFormBtn">New Group</button>
    </div>

    <form action="{{route('addnewgroup')}}" method="post" id="newGroupForm" style="display: none;">
    @csrf
        <h8>Add New Group</h8><br><br>
        <div class="input-field">
            <input type="text" name="group_name" placeholder="Enter group name">
            <span style="color: red;font-family: Comic Sans MS;font-size: x-small;" >@error('group_name'){{$message}}@enderror</span><br>
        </div><br>
        <div class = "new-add">
            <button type="submit">Add</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('toggleFormBtn').addEventListener('click', function() {
        var form = document.getElementById('newGroupForm');
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
        width: 20%;
        float: right;
        border: 4px solid goldenrod;
        border-radius: 20px;
        margin: 10px;
    }
    .new-add button{
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
    .new-add button:hover{
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
    .new-grp-btn button{
        background-color: lightgoldenrodyellow;
        width: fit-content;
        padding: 10px;
        margin: 10px;
        border-radius: 7.5px;
        border: 3px solid goldenrod;
        margin-left: 90%;
        cursor: pointer;
    }
    .new-grp-btn button:hover{
        background-color: lavender;
    }

</style>
