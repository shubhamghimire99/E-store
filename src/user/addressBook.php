<?php
include "src/user/Navbar.php";
include "src/Database/connect.php";
$buyer_id = $_SESSION['user_id'];
$sql = "select * from user where id = '$buyer_id'";
$result = mysqli_query($conn, $sql);
$userdata = mysqli_fetch_assoc($result);

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
                            <p>Save your delivery and billing address here.</p>
                            <button class="open-button" onclick="openForm()"> <i class="fa-solid fa-plus"></i> Add New Delivery Address</button>

                            <div class="form-popup" id="myForm">
                                <form action="#" class="form-container">
                                    <h2>Add New Delivery Address</h2>
                                    <div class="address-form-left">
                                        <div class="input-field">
                                            <label for="name"><b>Full Name</label>
                                            <input type="text" value="<?php echo $userdata['firstname'] . ' ' . $userdata['lastname'] ?>" disable>
                                        </div>
                                        <label for="phonenumber">phonenumber</label>
                                        <input type="text" placeholder="Enter phonenumber" name="phonenumber" required>

                                        <label for="Province">Province</label>
                                        <!-- <input type="text" placeholder="Please choose Your Province" name="Province" required> -->
                                        <select name="state">
                                            <option value="">Select State</option>
                                            <option value="koshi_province">Koshi Province</option>
                                            <option value="madhesh_province">Madhesh Province</option>
                                            <option value="bagmati_province">Bagmati Province</option>
                                            <option value="gandaki_province">Gandaki Province</option>
                                            <option value="lumbini_province">Lumbini Province</option>
                                            <option value="karnali_province">Karnali Province</option>
                                            <option value="sudurpaschim_province">Sudurpaschim Province</option>
                                        </select>


                                        <label for="distrit">District</label>
                                        <!-- <input type="text" placeholder="Please Choose Your City/Muncipality" name="Province" required> -->
                                        <select name="district">
                                            <option value="">Select District</option>
                                            <option value="bhojpur">Bhojpur</option>
                                            <option value="dhankuta">Dhankuta</option>
                                            <option value="ilam">Ilam</option>
                                            <option value="jhapa">Jhapa</option>
                                            <option value="khotang">Khotang</option>
                                            <option value="morang">Morang</option>
                                            <option value="okhaldhunga">Okhaldhunga</option>
                                            <option value="pachthar">Pachthar</option>
                                            <option value="sankhuwasabha">Sankhuwasabha</option>
                                            <option value="solukhumbu">Solukhumbu</option>
                                            <option value="sunsari">Sunsari</option>
                                            <option value="taplejung">Taplejung</option>
                                            <option value="terhathum">Terhathum</option>
                                            <option value="udayapur">Udayapur</option>
                                            <option value="parsa">Parsa</option>
                                            <option value="bara">Bara</option>
                                            <option value="rautahat">Rautahat</option>
                                            <option value="sarlahi">Sarlahi</option>
                                            <option value="siraha">Siraha</option>
                                            <option value="dhanusha">Dhanusha</option>
                                            <option value="saptari">Saptari</option>
                                            <option value="mahottari">Mahottari</option>
                                            <option value="bhaktapur">Bhaktapur</option>
                                            <option value="chitwan">Chitwan</option>
                                            <option value="dhading">Dhading</option>
                                            <option value="dolakha">Dolakha</option>
                                            <option value="kathmandu">Kathmandu</option>
                                            <option value="kavrepalanchok">Kavrepalanchok</option>
                                            <option value="lalitpur">Lalitpur</option>
                                            <option value="makwanpur">Makwanpur</option>
                                            <option value="nuwakot">Nuwakot</option>
                                            <option value="ramechap">Ramechap</option>
                                            <option value="rasuwa">Rasuwa</option>
                                            <option value="sindhuli">Sindhuli</option>
                                            <option value="sindhupalchok">Sindhupalchok</option>
                                            <option value="baglung">Baglung</option>
                                            <option value="gorkha">Gorkha</option>
                                            <option value="kaski">Kaski</option>
                                            <option value="lamjung">Lamjung</option>
                                            <option value="manang">Manang</option>
                                            <option value="mustang">Mustang</option>
                                            <option value="myagdi">Myagdi</option>
                                            <option value="nawalpur">Nawalpur</option>
                                            <option value="parwat">Parwat</option>
                                            <option value="syangja">Syangja</option>
                                            <option value="tanahun">Tanahun</option>
                                            <option value="kapilvastu">Kapilvastu</option>
                                            <option value="parasi">Parasi</option>
                                            <option value="rupandehi">Rupandehi</option>
                                            <option value="arghakhanchi">Arghakhanchi</option>
                                            <option value="gulmi">Gulmi</option>
                                            <option value="palpa">Palpa</option>
                                            <option value="dang">Dang</option>
                                            <option value="pyuthan">Pyuthan</option>
                                            <option value="rolpa">Rolpa</option>
                                            <option value="eastern_rukum">Eastern Rukum</option>
                                            <option value="banke">Banke</option>
                                            <option value="bardiya">Bardiya</option>
                                            <option value="western_rukum">Western Rukum</option>
                                            <option value="salyan">Salyan</option>
                                            <option value="dolpa">Dolpa</option>
                                            <option value="humla">Humla</option>
                                            <option value="jumla">Jumla</option>
                                            <option value="kalikot">Kalikot</option>
                                            <option value="mugu">Mugu</option>
                                            <option value="surkhet">Surkhet</option>
                                            <option value="dailekh">Dailekh</option>
                                            <option value="jajarkot">Jajarkot</option>
                                            <option value="darchula">Darchula</option>
                                            <option value="bajhang">Bajhang</option>
                                            <option value="bajura">Bajura</option>
                                            <option value="baitadi">Baitadi</option>
                                            <option value="doti">Doti</option>
                                            <option value="acham">Acham</option>
                                            <option value="dadeldhura">Dadeldhura</option>
                                            <option value="kanchanpur">Kanchanpur</option>
                                            <option value="kailali">Kailali</option>
                                        </select>

                                        <label for="area">area</label>
                                        <input type="text" placeholder="Please Choose Your area" name="Province" required>
                                    </div>
                                    <div class="address-form-right">
                                        <label for="address">address</label>
                                        <input type="text" placeholder="Please Choose Your addess" name="Province" required>

                                        <label for="address">Address</label>
                                        <input type="text" placeholder="Enter Address" name="address" required>

                                        <label for="landmark">landMark</label>
                                        <input type="text" placeholder="Enter landmark" name="landmark" required>

                                        <label for="effective">Effective Delivery</label>
                                        <div class="effectivedelivery">
                                            <button value="home">Home</button>
                                            <button value="office">Office</button>
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
    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
    </script>

</body>

</html>