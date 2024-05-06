<script src="{{ asset('assets/js/all.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
<script src="{{ asset('assets/js/custom.min.js') }}"></script>
<script src="{{ asset('assets/js/common-chat.js') }}"></script>
<script src="{{ asset('assets/js/custom-emoji.js') }}"></script>

<script src="https://www.gstatic.com/firebasejs/7.13.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.13.1/firebase-analytics.js"></script>

<!-- Add Firebase products that you want to use -->
<script src="https://www.gstatic.com/firebasejs/7.13.1/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.13.1/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.13.1/firebase-firestore.js"></script>
<script>
    new EmojiPicker({
        trigger: [{
            selector: ".second-btn",
            insertInto: ".two",
        }, ],
        closeButton: true,
        //specialButtons: green
    });
</script>
<script>
    const firebaseConfig = {
        apiKey: "AIzaSyCblb-iDhG-0Ss-HajlhPkR5U1cjaqtXv4",
        authDomain: "charitywallet-f5352.firebaseapp.com",
        databaseURL: "https://charitywallet-f5352-default-rtdb.firebaseio.com",
        projectId: "charitywallet-f5352",
        storageBucket: "charitywallet-f5352.appspot.com",
        messagingSenderId: "288559228798",
        appId: "1:288559228798:web:1dc68e93f49a25ec21752f",
        measurementId: "G-KBXGD8DZFZ"
    };

    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
    // console.log(firebase);
</script>
@stack('custom_js')
{{-- charity-wallet-dashboard --}}