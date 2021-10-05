<?php namespace App\Views;


print '
<form action="" method="POST">
    <input type="submit" value="Save" name="save">
    <input type="submit" value="Cancel" name="cancel">
    <label for="sku">SKU</label>
    <input type="text" id="sku" name="sku">
    <label for="name">Name</label>
    <input type="text" id="name" name="name">
    <label for="price">Price</label>
    <input type="text" id="price" name="price">
    <label for="options">Type Switcher</label>
    <select id="options" name="choose" onchange="myFunction()">
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
</form>
';
