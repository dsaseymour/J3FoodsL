@extends('layouts.master')

@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.topbar')
@endsection

<style>
  .instructions{
    list-style: decimal inside;
    padding-left: 2%;
  }
</style>
@section('content')
<div class="col-md-4 col-md-offset-2">
  <h2><u>User Manual</u></h3>
  <h2>Login and Registration</h2>
  <div class="row">
    <h1 id="lpinfo-heading">Register as a Customer</h1>
    <ol class="instructions">
      <li>From the homepage click the blue customer button. This will bring you to the customer login page.</li>
      <li>Once you are at the login page, click on the blue register buttons. This will bring up the registration fields.</li>
      <li>Fill out each of the 4 fields: your name, your email, password, and password comfirmation. Then click the register button at the bottom of the form.</li>
      <li>You will be sent an email for verification of your account. Until then you will not be able to place orders. Once you get the email click on the link provided.</li>
      <li>This will automatically log you in as a customer. From there you can explore our website. Or for more information click on the person picture in the top right corner and select 'Help'.</li>
    </ol>
  </div>
  <div class="row">
    <h1 id="lpinfo-heading">Enter as a Guest</h1>
    <ol class="instructions">
      <li>From the homepage click the ‘Guest’ button.</li>
      <li>You will be brought to a selection of restaurants.</li>
    </ol>
  </div>
  <div class="row">
    <h1 id="lpinfo-heading">Register as a Restaurant</h1>
    <ol class="instructions">
      <li>From the homepage click on the ‘Login’ button.</li>
      <li>Once you are at the login page, click on the blue ‘Register A Restaurant’  button. This will bring up the registration fields.</li>
      <li>Fill out each each of the fields. Then click the register button at the bottom of the form.</li>
      <li>This will automatically log you in as a restaurant. From here you will be prompted to set your store hours. Check the days which you are open and pick the open and close times for those days. Click Reset Hours when you are done. Don’t worry your business hours can be changed any time in the Edit Profile page.</li>
      <li>You will be sent an email for verification of your account. Until then Customers will not be able to place orders. Once you get the email click on the link provided.</li>
      <li>From there you can explore our website. For more information click on the person picture in the top right corner and select 'Help'.</li>
    </ol>
  </div>
  <div class="row">
    <h1 id="lpinfo-heading">Login to Your Acccount</h1>
    <ol class="instructions">
      <li>From the homepage click on login. This will take you to the login page.</li>
      <li>Type in your email address and password and you will be logged into that account. Your email will identify if you are a customer or restaurant.</li>
    </ol>
  </div>
  <div class="row">
    <h1 id="lpinfo-heading">Logout of Your Acccount</h1>
    <ol class="instructions">
      <li>To logout for both customer and restaurant users click the person icon in the top right corner and select the Logout option.</li>
    </ol>
  </div>
  <h2>Restaurant Side Interaction</h2>
  <div class="row">
    <h1 id="lpinfo-heading">Orders</h1>
    <ol class="instructions">
      <li>This page is where you manage your orders. Some actions which you can take are discussed below.</li>
      <li>Open/Close: Click the Close button to cease operation, meaning that a customer will no longer be able to order from your restaurant. This will then automatically turn into the Open button, once you click the Open button you will begin operations again, and the Close button will appear.</li>
      <li>Orders that are completed by your restaurant should be checked off by clicking the green 'Order Completed' button.</li>
      <li>Orders can also be canceled. To do this  click on the red 'Cancel Order'button for some order. It will automatically notify the customer of your decision.</li>
      <li>To switch pages click on one of the other tabs near the top of the page.</li>
    </ol>
  </div>
  <div class="row">
    <h1 id="lpinfo-heading">Menu</h1>
    <ol class="instructions">
      <li>The menu page allows a the restaurant to customize their menu.</li>
      <li>To add a menu category (such as appetizers), click on the 'Add Category' button. This will pop up a form to fill in.
        <ol class="instructions"W>
          <li>Under the Category field type in the name of the category.</li>
          <li>Once you choose a category name click the 'Add' button.</li>
          <li>To rearrange the order of the categories click and drag them to put them in your preferred order.</li>
          <li>To delete a category click the red ‘x’ at the top right of a category.</li>
        </ol> 
      </li>
      <li>To add an item click the 'Add Item' button. This will pop up a form to fill in.
        <ol class="instructions">
          <li>Under the Category field use the drop down field to pick one of your categories to place this item under.</li>
          <li>Under Item Name type in the name of your item.</li>
          <li>Under Price type in the price as a number without a dollar sign. Just the numeric price.</li>
          <li>Under the image field, paste a link of an image of this food item.</li>
          <li>If you don’t want to add any item option you are done. Click Save Changes and a new item will be placed in your menu. Otherwise click on the Options tab.</li>
          <li>First check the box that asks if this item has options.</li>
          <li>Then using the 3 radio buttons and select one of Textbox, Select one option, or Select many options.
            <ol class="instructions">
              <li>Textbox allows the customer to type in an option that they can choose to include or not include as part of the item. (ie special instructions)</li>
              <li>Select one option allows you to create a combobox where the customer can then select one of many options to go alongside their meal. (ie. one of many wing sauces)</li>
              <li>Select many options allows you to create a checkbox where the customer can then select many options that you have set out for them. (ie many pizza toppings)</li>
            </ol>
          </li>
          <li>Click Save Changes when you are done to add the Item to your menu.</li>
        </ol>  
      </li>
      <li>When you are done click the Save Category List button to save all your changes to the menu.</li>
    </ol>
  </div>
  <div class="row">
    <h1 id="lpinfo-heading">History</h1>
    <ol class="instructions">
      <li>The history page is the start of our analytics. Use this page to look at your monthly sales. You can see it as a bar graph and the raw sales number as well.</li>
      <li>Total sum of only the orders which have been completed are shown here.</li>
    </ol>
  </div>
  <div class="row">
    <h1 id="lpinfo-heading">Reviews</h1>
    <ol class="instructions">
      <li>After a customer orders from your restaurant they are prompted automatically to leave a review.</li>
      <li>Use this review page to view what customers think of your restaurant.</li>
    </ol>
  </div>
  <div class="row">
    <h1 id="lpinfo-heading">Edit Profile</h1>
    <ol class="instructions">
      <li>From the edit profile pages you can edit 3 aspects of your profile, the general settings (same as your registration information), some customer restrictions and your hours of operation.</li>
      <li>To edit your general setting just change any information that needs to be updated and click Save Changes.</li>
      <li>Under the restrictions tab you can set a Maximum Order Price, meaning a Customer cannot place an order exceeding a certain price that you set. You can also choose whether or not a guest customer will have the privilege of ordering from your restaurant, Click Save Changes when you are done.</li>
      <li>The hours tab will allow you to change your hours of operation. Check the days which you are open and pick the open and close times for those days. Click Reset Hours when you are ready.</li>
    </ol>
  </div>

  <h2>Customer Side Interaction</h2>
  <div class="row">
    <h1 id="lpinfo-heading">Overview</h1>
    <ol class="instructions">
      <li>From the overview page you can see what restaurants are currently available to order from. Faded restaurants are not available for orders.</li>
      <li>To favourite a restaurant click on the star beside their name, this will fill in the star with colour. To unfavourite do the same, this will unfill the star.</li>
      <li>To search for a specific restaurant type in the restaurants names in the top right corner in the search bar.</li>
      <li>To sort the restaurants, click on Sort in the top right corner and select a sorting method.</li>
      <li>Click on a restaurant to visit their menu.</li>
    </ol>
  </div>
  <div class="row">
    <h1 id="lpinfo-heading">Restaurant Menu Page</h1>
    <ol class="instructions">
      <li>After you clicked on a restaurant you will be brought to their menu.</li>
      <li>To Sort the items select a Sort by option from the drop down menu in the top left corner of the menu.</li>
      <li>To search for a specific item type in the name of the item in the Search menu search bar near the top of the menu.</li>
      <li>When you click on a item you are prompted with the options of the item and the quantity that you wish to order. After you select the options and Quantity click Add to order to add to your shopping cart. You will be brought back to the menu. Select more items or move onto the next step.</li>
      <li>When you are done choosing your items click on the shopping cart icon in the top right of the screen. This will bring you to the Confirmation Page.</li>
    </ol>
  </div>
  <div class="row">
    <h1 id="lpinfo-heading">Confirmation Page</h1>
    <ol class="instructions">
      <li>You are brought to the confirmation page to make sure the order you placing through to the restaurant of your choice is correct.</li>
      <li>If you see an error and want to Remove an item click on the red X to get it off your order. If you want to cancel or make further additions to the order just navigate away from this page.</li>
      <li>When you are ready to place the order click Order. You will get a popup, click view order receipt to see your receipt.</li>
      <li>The restaurant is now processing your order. You will be sent a copy of the receipt via email. You will be notified via email if the order has been canceled. You can now click Return and go back to the overview page.</li>
    </ol>
  </div>
  <div class="row">
    <h1 id="lpinfo-heading">Edit Profile</h1>
    <ol class="instructions">
      <li>The edit profile page lets you change information such as: Name, Phone Number and the Address that the restaurant will deliver to.</li>
    </ol>
  </div>

</div>
@endsection
