<!-- <form action="https://appzzz.000webhostapp.com/app/public/" onsubmit="postSubmit.bind(this)(event, displayAvatar)"> -->

<!-- BLOCKED BY CORS -->


<form action="api.php">
    <select name="fields" id="" multiple>
        <option value="firstname">Firstname</option>
        <option value="lastname">Lastname</option>
        <option value="old">Years</option>
        <option value="image">Images</option>
        <option value="email">Email</option>
    </select>
    <input type="submit" value='request'>
</form>

<div id="app">
</div>

<script src='request.js'></script>
<script src='script.js'></script>