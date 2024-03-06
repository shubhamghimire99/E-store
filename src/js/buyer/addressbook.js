function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
  document.getElementById("edit-myForm").style.display = "none";
}


var nepalData = {
  "Koshi Province": {
    "Bhojpur": ["Bhojpur Municipality", "Shadanand Municipality", "Aamchok Rural Municipality"],
    "Dhankuta": ["Dhankuta Municipality", "Pakhribas Municipality", "Sangurigadhi Rural Municipality"],
    "Ilam": ["Ilam Municipality", "Deumai Municipality", "Mai Municipality"],
    "Jhapa": ["Damak Municipality", "Bhadrapur Municipality", "Mechinagar Municipality"],
    "Khotang": ["Diktel Rupakot Majhuwagadhi Municipality", "Khotehang Rural Municipality", "Halesi Tuwachung Municipality"],
    "Morang": ["Biratnagar Metropolitan City", "Urlabari Municipality", "Biratnagar Sub-Metropolitan City"],
    // Add more districts and municipalities as needed
  },
  "Madhesh Province": {
    "Bara": ["Kalaiya Sub-Metropolitan City", "Jeetpur Simara Sub-Metropolitan City", "Nijgadh Municipality"],
    "Rautahat": ["Gaur Municipality", "Chandrapur Municipality", "Dewahi Gonahi Municipality"],
    "Mahottari": ["Jaleshwor Municipality", "Bardibas Municipality", "Gaushala Municipality"],
    "Sarlahi": ["Malangwa Municipality", "Haripur Municipality", "Bagmati Municipality"],
    "Saptari": ["Rajbiraj Municipality", "Kanchanrup Municipality", "Hanumannagar Kankalini Municipality"],
    // Add more districts and municipalities as needed
  },
  // Add more provinces with districts and municipalities
  "Bagmati Province": {
    "Bhaktapur": ["Bhaktapur Municipality", "Changunarayan Municipality", "Madhyapur Thimi Municipality"],
    "Kathmandu": ["Kathmandu Metropolitan City", "Kirtipur Municipality", "Gokarneshwar Municipality"],
    "Lalitpur": ["Lalitpur Metropolitan City", "Mahalaxmi Municipality", "Godawari Municipality"],
    "Nuwakot": ["Bidur Municipality", "Kakani Rural Municipality", "Dupcheshwar Rural Municipality"],
    "Rasuwa": ["Dhunche Municipality", "Kalika Rural Municipality", "Gosaikunda Municipality"],
    "Sindhupalchowk": ["Chautara Sangachowkgadi Municipality", "Melamchi Municipality", "Balephi Rural Municipality"],
    // Add more districts and municipalities as needed
  },
  "Gandaki Province": {
    "Kaski": ["Pokhara Metropolitan City", "Lekhnath Municipality", "Rupa Rural Municipality"],
    "Tanahun": ["Bhimad Municipality", "Byas Municipality", "Bandipur Rural Municipality"],
    "Gorkha": ["Gorkha Municipality", "Palungtar Municipality", "Aarughat Rural Municipality"],
    "Lamjung": ["Besisahar Municipality", "Madhya Nepal Municipality", "Rainas Municipality"],
    "Manang": ["Chame Rural Municipality", "Nashong Rural Municipality", "Narphu Rural Municipality"],
    // Add more districts and municipalities as needed
  },
  "Lumbini Province": {
    "Rupandehi": ["Siddharthanagar Sub-Metropolitan City", "Butwal Sub-Metropolitan City", "Tilottama Municipality"],
    "Kapilvastu": ["Taulihawa Municipality", "Banganga Municipality", "Mayadevi Rural Municipality"],
    "Nawalparasi East": ["Kawasoti Municipality", "Madhyabindu Municipality", "Devchuli Municipality"],
    "Nawalparasi West": ["Parasi Municipality", "Ramgram Municipality", "Gaidakot Municipality"],
    "Palpa": ["Tansen Municipality", "Rampur Municipality", "Ranighat Sisahaniya Rural Municipality"],
    "Arghakhanchi": ["Sandhikharka Municipality", "Bhumikasthan Municipality", "Sitganga Municipality"],
    // Add more districts and municipalities as needed
  },
  "Karnali Province": {
    "Jumla": ["Chandannath Municipality", "Tila Rural Municipality", "Hima Rural Municipality"],
    "Dolpa": ["Dunai Rural Municipality", "Thuli Bheri Municipality", "Tripurasundari Municipality"],
    "Humla": ["Simikot Municipality", "Namkha Rural Municipality", "Sarkegad Rural Municipality"],
    "Mugu": ["Gamgadhi Municipality", "Soru Rural Municipality", "Khatyad Rural Municipality"],
    "Kalikot": ["Manma Municipality", "Raskot Municipality", "Sanni Triveni Rural Municipality"],
    "Surkhet": ["Birendranagar Municipality", "Bheriganga Municipality", "Chaukune Rural Municipality"],
    // Add more districts and municipalities as needed
  },
  "Sudurpashchim Province": {
    "Kailali": ["Dhangadhi Sub-Metropolitan City", "Tikapur Municipality", "Ghodaghodi Municipality"],
    "Kanchanpur": ["Bhimdatta Municipality", "Mahakali Municipality", "Shuklaphanta Municipality"],
    "Achham": ["Mangalsen Municipality", "Kamalbazar Municipality", "Panchadewal Binayak Municipality"],
    "Doti": ["Dipayal Silgadhi Municipality", "Shikhar Municipality", "Jorayal Rural Municipality"],
    "Bajhang": ["Chainpur Municipality", "Jaya Prithvi Municipality", "Saipal Rural Municipality"],
    "Bajura": ["Martadi Municipality", "Badimalika Municipality", "Triveni Municipality"],
    // Add more districts and municipalities as needed
  }
};

function populateCities() {
  var stateSelect = document.getElementById("state");

  var citySelect = document.getElementById("city");

  var selectedState = stateSelect.value;

  citySelect.innerHTML = "<option value=''>Select City/Municipality</option>";

  if (selectedState !== "") {
    var cities = Object.keys(nepalData[selectedState]);
    cities.forEach(function (city) {
      var option = document.createElement("option");
      option.text = city;
      option.value = city;
      citySelect.appendChild(option);
      // editcitySelect.appendChild(option.cloneNode(true));
    });
  }

  var editstateSelect = document.getElementById("edit-state");
  var editcitySelect = document.getElementById("edit-city");
  var editselectedState = editstateSelect.value;
  editcitySelect.innerHTML = "<option value=''>Select City/Municipality</option>";

  if (editselectedState !== "") {
    var editcities = Object.keys(nepalData[editselectedState]);
    editcities.forEach(function (city) {
      var option = document.createElement("option");
      option.text = city;
      option.value = city;
      editcitySelect.appendChild(option);
    });
  }
}


// Function to populate areas based on selected city
function populateAreas() {
  var stateSelect = document.getElementById("state");
  var citySelect = document.getElementById("city");
  var areaSelect = document.getElementById("area");
  var selectedState = stateSelect.value;
  var selectedCity = citySelect.value;
  areaSelect.innerHTML = "<option value=''>Select Area</option>";
  if (selectedState !== "" && selectedCity !== "") {
    var areas = nepalData[selectedState][selectedCity];
    areas.forEach(function (area) {
      var option = document.createElement("option");
      option.text = area;
      option.value = area;
      areaSelect.appendChild(option);
    });
  }
  var editstateSelect = document.getElementById("edit-state");
  var editcitySelect = document.getElementById("edit-city");
  var editareaSelect = document.getElementById("edit-area");
  var editselectedState = editstateSelect.value;
  var editselectedCity = editcitySelect.value;
  editareaSelect.innerHTML = "<option value=''>Select Area</option>";
  if (editselectedState !== "" && editselectedCity !== "") {
    var editareas = nepalData[editselectedState][editselectedCity];
    editareas.forEach(function (area) {
      var option = document.createElement("option");
      option.text = area;
      option.value = area;
      editareaSelect.appendChild(option);
    });
  }



}

// Populate states initially
var stateSelect = document.getElementById("state");
var editstateSelect = document.getElementById("edit-state");
for (var state in nepalData) {
  var option = document.createElement("option");
  option.text = state;
  option.value = state;
  stateSelect.appendChild(option);
  editstateSelect.appendChild(option.cloneNode(true));
}

function editAddress(id) {
  // get id of the address to be edited and pass it to edit popup

  console.log("id", id);
  // console.log(addressJson);
  address_id = id;
  document.getElementById("address_id").value = id;

  var address = addressJson.find((address) => address.address_id == id);
  console.log(address);



  document.getElementById("edit-myForm").style.display = "block";
}


function deleteAddress(id) {
  window.location.href = "/deleteAddress?id=" + id;
}