import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
import { getFirestore } from "firebase/firestore";

const firebaseConfig = {
	apiKey: "AIzaSyD9ZOlhySBzA6fGDmWUaLeDOnm5tt5AwMQ",
	authDomain: "ticket-bae81.firebaseapp.com",
	projectId: "ticket-bae81",
	storageBucket: "ticket-bae81.appspot.com",
	messagingSenderId: "447863426485",
	appId: "1:447863426485:web:7269c924c7aef9b49e5dfc",
	measurementId: "G-5TGS47QPD2",
};

let app = null;
let analytics = null;
let firestore = null;

app = initializeApp(firebaseConfig);

if (typeof window !== "undefined") {
	analytics = getAnalytics(app);
	firestore = getFirestore(app);
}

export { app, analytics, firestore };
