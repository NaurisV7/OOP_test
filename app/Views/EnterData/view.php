<title>Product Add</title>
<link rel="stylesheet" href="../../test_OOP/style.css">

<div>
    <h1>Product Add</h1>
</div>

<form class="form" action="" method="POST">
    <label for="sku">SKU</label>
    <input type="text" id="sku" name="sku" required>
    <label for="name">Name</label>
    <input type="text" id="name" name="name" required>
    <label for="price">Price</label>
    <input type="text" id="price" name="price" required>
    <label for="options">Type Switcher</label>
    <select id="options" name="choose" onchange="myFunction()" required>
        <option value="dvd">Shelf</option>
        <option value="furniture">Furniture</option>
        <option value="book">Appliances</option>
    </select>   
    <div class ="hidden" id="sizediv">
        <label for="size">Size</label>
        <input type="text" id="size" name="size">
        <p></p>
    </div>
    <div class="hidden" id ="heightdiv">
        <label for="height">Height</label>
        <input type="text" id="height" name="height">
        <label for="width">Width</label>
        <input type="text" id="width" name="width">
        <label for="length">Length</label>
        <input type="text" id="length" name="length">
        <p></p>
    </div>
    <div class="hidden" id="weightdiv">
        <label for="weight">Weight</label>
        <input type="text" id="weight" name="weight">
        <p></p>
    </div>
    <button type="submit">Save</button>
</form>

<?php

?>

<script src="../../../public/script.js"></script>