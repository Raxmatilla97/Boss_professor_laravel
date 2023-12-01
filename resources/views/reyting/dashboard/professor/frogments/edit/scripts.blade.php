<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Tablarni boshqarish uchun JavaScript kodi
        const tabs = document.querySelectorAll('.tab-link');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach((tab, index) => {
            tab.addEventListener('click', () => {
                // Aktiv tabni tanlash
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                // Faol kontentni ko'rsatish
                tabContents.forEach(tc => tc.classList.add('hidden'));
                tabContents[index].classList.remove('hidden');
            });
        });
    });
</script>

<script>
    // JavaScript kod bu agarda request back bo'lganda aynan shu sahifani(tabs) ochishi uchun!
    document.addEventListener("DOMContentLoaded", function() {
        // Get the current URL fragment
        var currentFragment = window.location.hash.substring(1);

        // If a fragment is specified and corresponds to a tab, show that tab
        if (currentFragment) {
            showTab(currentFragment);
        }

        // Add click event listeners to tab buttons
        document.querySelectorAll('.tab-button').forEach(function(button) {
            button.addEventListener('click', function(event) {
                var tabId = event.target.getAttribute('href').substring(1);
                showTab(tabId);

                // Update the URL fragment
                window.location.hash = tabId;
            });
        });

        // // Function to show a specific tab
        // function showTab(tabId) {
        //     document.querySelectorAll('.tab-content').forEach(function(tabContent) {
        //         tabContent.style.display = 'none';
        //     });

        //     document.getElementById(tabId).style.display = 'block';
        // }
    });
</script>

<script>
    function previewImage(event) {
        var input = event.target;

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById('image-preview').src = e.target.result;
                document.getElementById('image-preview').style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>