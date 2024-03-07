<?php
include "src/user/Navbar.php";
include "src/Database/connect.php";
$buyer_id = $_SESSION['user_id'];
$user = "select * from user where id = '$buyer_id'";
$userresult = mysqli_query($conn, $user);
$userdata = mysqli_fetch_assoc($userresult);
$address = "SELECT * FROM addressbook WHERE user_id = '$buyer_id' AND address_status = 'active'";
$addressresult = mysqli_query($conn, $address);
$address = mysqli_fetch_all($addressresult, MYSQLI_ASSOC);
$address_json = json_encode($address);
// echo "<script>console.log($address_json);</script>";



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Book</title>
    <link rel="stylesheet" href="/src/css/seller/profile.css">
    <link rel="stylesheet" href="/src/css/buyer/profile.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php 
       echo "<script> const addressJson = JSON.parse('$address_json'); </script>" 
       
    ?>
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="menubar">
                <h2>Manage my account</h2>
                <ul>
                    <li><a href="/user-profile">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                    <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2" />
                                    <path d="M4.271 18.346S6.5 15.5 12 15.5s7.73 2.846 7.73 2.846M12 12a3 3 0 1 0 0-6a3 3 0 0 0 0 6" />
                                </g>
                            </svg>
                            Profile</a></li>
                    <li class="active"><a href="/address-book"><svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m17 16l-.15-1.25q-.2-.075-.35-.162t-.3-.238l-1.15.5l-1-1.75l1-.75q-.05-.2-.05-.375t.05-.375l-1-.75l1.05-1.7l1.1.45q.15-.125.3-.2t.35-.15L17 8h2l.15 1.25q.2.075.35.15t.3.2l1.1-.45l1.05 1.7l-1 .75q.05.2.05.375t-.05.375l1 .75l-1 1.75l-1.15-.5q-.15.15-.3.237t-.35.163L19 16zm1-2.5q.65 0 1.075-.425T19.5 12q0-.65-.425-1.075T18 10.5q-.65 0-1.075.425T16.5 12q0 .65.425 1.075T18 13.5M5 23V1h14v6h-2V6H7v12h10v-1h2v6z" />
                            </svg>
                            Address Book</a></li>
                    <li><a href="/order"><svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m17 16l-.15-1.25q-.2-.075-.35-.162t-.3-.238l-1.15.5l-1-1.75l1-.75q-.05-.2-.05-.375t.05-.375l-1-.75l1.05-1.7l1.1.45q.15-.125.3-.2t.35-.15L17 8h2l.15 1.25q.2.075.35.15t.3.2l1.1-.45l1.05 1.7l-1 .75q.05.2.05.375t-.05.375l1 .75l-1 1.75l-1.15-.5q-.15.15-.3.237t-.35.163L19 16zm1-2.5q.65 0 1.075-.425T19.5 12q0-.65-.425-1.075T18 10.5q-.65 0-1.075.425T16.5 12q0 .65.425 1.075T18 13.5M5 23V1h14v6h-2V6H7v12h10v-1h2v6z" />
                            </svg>
                            Orders</a></li>
                </ul>
            </div>
            <div class="content">
                <h2>Address Book</h1>
                    <hr>
                    <div class="address">
                        <div class="delivery">
                            <div class="cards">
                                <?php foreach ($addressresult as $address) : ?>
                                    <div class="card">
                                        <h3>Delivery Address -
                                            <?php if ($address['effectivedelivery'] == 'Home') {
                                                echo "<span>Home</span>";
                                            } else {
                                                echo "<span>Office</span>";
                                            } ?>
                                        </h3>
                                        <div class="address-details">
                                            <h1><?php echo $address['phone'] ?></h1>
                                            <p><?php echo $address['province'] . ', ' . $address['city']  . ', ' . $address['area']  ?></p>
                                            <p><?php echo $address['address'] . ', ' . $address['Landmark'] ?></p>
                                        </div>
                                        <div class="action-btn">
                                            <button onclick="editAddress(<?php echo $address['address_id']?>)">Edit</button>
                                            <button onclick="deleteAddress(<?php echo $address['address_id'] ?>)">Delete</button>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>


                            <!-- if no data in database -->
                            <?php

                            if (mysqli_num_rows($addressresult) == 0) {
                                echo "<p>Save your delivery and billing address here.</p>";
                                echo "<button class='open-button' onclick='openForm()'> <i class='fa-solid fa-plus'></i> Add New Delivery Address</button>";
                            } else {
                                echo "<button class='open-button' onclick='openForm()'> <i class='fa-solid fa-plus'></i> Add New Delivery Address</button>";
                            }

                            ?>
                          
                            <!-- add form popup -->

                            <div class="form-popup" id="myForm">
                                <form action="/addAddress" class="form-container" method="post">
                                    <h2>Add New Delivery Address</h2>
                                    <div class="address-form-left">
                                        <div class="input-field">
                                            <label for="name"><b>Full Name</label>
                                            <input type="text" value="<?php echo $userdata['firstname'] . ' ' . $userdata['lastname'] ?>" disable>
                                        </div>
                                        <label for="phonenumber">phonenumber</label>
                                        <input type="text" placeholder="Enter phonenumber" name="phone" required>

                                        <label for="Province">Province</label>
                                        <select id="state" name="province" onchange="populateCities()">
                                            <option value="">Select State</option>
                                            <!-- Options will be populated dynamically using JavaScript -->
                                        </select>
                                        <label for="City">City</label>
                                        <select id="city" name="city" onchange="populateAreas()">
                                            <option value="">Select City/Municipality</option>
                                            <!-- Options will be populated dynamically using JavaScript -->
                                        </select>
                                        <label for="Area">Area</label>
                                        <select id="area" name="area">
                                            <option value="">Select Area</option>
                                            <!-- Options will be populated dynamically using JavaScript -->
                                        </select>
                                    </div>
                                    <div class="address-form-right">
                                        <label for="address">Address</label>
                                        <input type="text" placeholder="Enter Address" name="address" required>

                                        <label for="landmark">landMark (optional)</label>
                                        <input type="text" placeholder="Enter landmark" name="landmark">

                                        <label for="effective">Effective Delivery</label>
                                        <div class="effectivedelivery">
                                            <div class="radio-input">
                                                <input value="Home" name="effectivedelivery" id="value-1" type="radio">
                                                <label for="value-1">Home</label>
                                                <input value="Office" name="effectivedelivery" id="value-2" type="radio">
                                                <label for="value-2">Office</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="action-btns">
                                        <button type="Submit" class="btn">Save</button>
                                        <button class="btn cancel" onclick="closeForm()">Close</button>
                                    </div>
                                </form>
                            </div>
                            <!-- edit form popup -->
                            <div class="form-popup" id="edit-myForm" >
                                <form action="/editAddress" class="form-container" method="post">
                                    
                                    <h2>Edit Delivery Address</h2>


                                    <input type="hidden" name="address_id" id="address_id">
                                    <!-- get address details from address_id above -->
                                    <div class="address-form-left">
                                        <div class="input-field">
                                            <label for="name"><b>Full Name</label>
                                            <input type="text" value="<?php echo $userdata['firstname'] . ' ' . $userdata['lastname'] ?>" disable>
                                        </div>
                                        <label for="phonenumber">phonenumber</label>
                                        <input type="text" id="edit-phone" placeholder="Enter phonenumber" value="" name="phone" required>

                                        <label for="Province">Province</label>
                                        <select id="edit-state" name="province" onchange="populateCities()">
                                            <option id="Estate" value=""></option>
                                            <!-- Options will be populated dynamically using JavaScript -->
                                        </select>
                                        <label for="City">City</label>
                                        <select id="edit-city" name="city" onchange="populateAreas()">
                                            <option id="Ecity" value="">Select City/Municipality</option>
                                            <!-- Options will be populated dynamically using JavaScript -->
                                        </select>
                                        <label for="Area">Area</label>
                                        <select id="edit-area" name="area">
                                            <option id="Earea" value="">Select Area</option>
                                            <!-- Options will be populated dynamically using JavaScript -->
                                        </select>
                                    </div>
                                    <div class="address-form-right">
                                        <label for="address">Address</label>
                                        <input type="text" id="edit-address" placeholder="Enter Address" value="<?php echo $address['address'] ?>" name="address" required>

                                        <label for="landmark">landMark (optional)</label>
                                        <input type="text" id="edit-landmark" placeholder="Enter landmark" value="" name="landmark">

                                        <label for="effective">Effective Delivery</label>
                                        <div class="effectivedelivery">
                                            <div class="radio-input" >
                                                <input value="Home" name="effectivedelivery" id="value-3" type="radio">
                                                <label for="value-3">Home</label>
                                                <input value="Office" name="effectivedelivery" id="value-4" type="radio">
                                                <label for="value-4">Office</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="action-btns">
                                        <button type="Submit" class="btn">Save</button>
                                        <button class="btn cancel" onclick="closeForm()">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <script src="/src/js/buyer/addressbook.js"></script>
</body>

</html>