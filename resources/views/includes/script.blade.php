<script src="{{ asset('Template/assets/static/js/components/dark.js') }}"></script>
<script src="{{ asset('Template/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('Template/assets/compiled/js/app.js') }}"></script>

<!-- Need: Apexcharts -->
<script src="{{ asset('Template/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
<script src=" {{ asset('Template/assets/static/js/pages/dashboard.js') }} "></script>
<script src="{{ asset('Template/assets/extensions/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('Template/assets/extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('Template/assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('Template/assets/static/js/pages/datatables.js') }}"></script>
<script src="{{ asset('Template/assets/static/js/pages/ui-chartjs.js') }}"></script>

{{-- datatable --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
<script src="{{ asset('Template/assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('Template/assets/static/js/pages/sweetalert2.js') }}"></script>
<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<!-- Geocoder Plugin -->
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script>
    "use strict";

    function loadLeaflet() {
        return new Promise((resolve, reject) => {
            if (window.L) {
                resolve();
                return;
            }

            const link = document.createElement('link');
            link.rel = 'stylesheet';
            link.href = 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.css';
            document.head.appendChild(link);

            const script = document.createElement('script');
            script.src = 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.js';
            script.onload = () => resolve();
            script.onerror = () => reject('Failed to load Leaflet JS');
            document.head.appendChild(script);
        });
    }

    function initMaps() {
        document.querySelectorAll('.map').forEach(el => {
            try {
                const coords = JSON.parse(el.dataset.coords) || [-7.250445, 112.768845];
                const zoom = Number(el.dataset.zoom) || 13;
                const mode = el.dataset.mode || 'detail';
                const name = el.dataset.name || 'No Name';

                const map = L.map(el.id).setView(coords, zoom);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; OpenStreetMap contributors'
                }).addTo(map);


                if (mode === 'add') {
                    const marker = L.marker(coords, {
                        draggable: true
                    }).addTo(map);

                    marker.on('dragend', function(e) {
                        const position = marker.getLatLng();
                        document.getElementById('latitude').value = position.lat.toFixed(6);
                        document.getElementById('longitude').value = position.lng.toFixed(6);
                    });

                    document.getElementById('latitude').value = coords[0].toFixed(6);
                    document.getElementById('longitude').value = coords[1].toFixed(6);

                    if (L.Control.geocoder) {
                        L.Control.geocoder({
                                defaultMarkGeocode: false
                            })
                            .on('markgeocode', function(e) {
                                const center = e.geocode.center;
                                map.setView(center, 16);
                                marker.setLatLng(center);
                                document.getElementById('latitude').value = center.lat.toFixed(6);
                                document.getElementById('longitude').value = center.lng.toFixed(6);
                            })
                            .addTo(map);
                    } else {
                        console.warn('Leaflet Control Geocoder is not loaded.');
                    }
                } else if (mode === 'detail') {
                    L.marker(coords).addTo(map)
                        .bindPopup(name)
                        .openPopup();
                } else if (mode == "edit-bengkel") {
                    const marker = L.marker(coords, {
                            draggable: true
                        }).addTo(map)
                        .bindPopup(name)
                        .openPopup();

                    marker.on('dragend', function(e) {
                        const position = marker.getLatLng();
                        document.getElementById('latitude').value = position.lat.toFixed(6);
                        document.getElementById('longitude').value = position.lng.toFixed(6);
                    });

                    document.getElementById('latitude').value = coords[0].toFixed(6);
                    document.getElementById('longitude').value = coords[1].toFixed(6);

                    if (L.Control.geocoder) {
                        L.Control.geocoder({
                                defaultMarkGeocode: false
                            })
                            .on('markgeocode', function(e) {
                                const center = e.geocode.center;
                                map.setView(center, 16);
                                marker.setLatLng(center);
                                document.getElementById('latitude').value = center.lat.toFixed(6);
                                document.getElementById('longitude').value = center.lng.toFixed(6);
                            })
                            .addTo(map);
                    } else {
                        console.warn('Leaflet Control Geocoder is not loaded.');
                    }
                }

            } catch (err) {
                console.error('Error in initializing map:', err);
            }
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        loadLeaflet()
            .then(initMaps)
            .catch(console.error);
    });
</script>
