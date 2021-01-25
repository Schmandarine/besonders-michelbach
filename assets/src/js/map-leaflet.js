
document.addEventListener("DOMContentLoaded", function () {


    var mymap = L.map('footer-map').setView([49.426, 10.916], 14);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}',
        { foo: 'bar', attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors' }
    ).addTo(mymap);

    var popupLocation1 = new L.LatLng(49.426, 10.916);
    var popupContent1 = '<div style="width:120px"><img src="' + stylesheet_directory_uri + '/img/michelbach-logo-footer.png" class="my-2" alt=""></div>',
        popup1 = new L.Popup({
            closeOnClick: false,
            autoClose: false,
            closeButton: false
        });
    popup1.setLatLng(popupLocation1);
    popup1.setContent(popupContent1);
    mymap.addLayer(popup1);
});