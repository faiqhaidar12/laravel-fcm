// Import Firebase CDN
importScripts("https://www.gstatic.com/firebasejs/12.2.1/firebase-app.js");
importScripts(
    "https://www.gstatic.com/firebasejs/12.2.1/firebase-messaging.js"
);

// Konfigurasi
const firebaseConfig = {
    apiKey: "AIzaSyAbL0bqvvrIyfzlpwVETLVJOFj1ZD6JaS0",
    authDomain: "notif-laravel-b262d.firebaseapp.com",
    projectId: "notif-laravel-b262d",
    storageBucket: "notif-laravel-b262d.firebasestorage.app",
    messagingSenderId: "1015214301846",
    appId: "1:1015214301846:web:125b0ac6afebf1108718b7",
    measurementId: "G-SBJJBZS0CD",
};

firebase.initializeApp(firebaseConfig);
const messaging = firebase.messaging();

// Listener pesan di background
messaging.onBackgroundMessage((payload) => {
    console.log("📩 Pesan background:", payload);
    self.registration.showNotification(payload.notification.title, {
        body: payload.notification.body,
        icon: "/icon.png", // optional
    });
});
