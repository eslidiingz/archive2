import React, { useEffect, useState } from "react";

// FIREBASE
import { app, analytics, firestore } from "/configs/config.firebase";
import { onSnapshot, collection, query, where, doc, setDoc, getDocs } from "firebase/firestore";
if (firestore) var db_notes = collection(firestore, "notes");

export default function Home() {

	const handleAddNote = async () => {
		try {
			
			let insertData = {
				name: "Los Angeles",
				state: "CA",
				country: "USA"
			}
			await setDoc(doc(db_notes), insertData);

		} catch (error) {
			console.log(" === error ");
			console.log(error);
		} finally {
			console.log(" === OLA ");
		}
	};

	useEffect(() => {
		if (db_notes) {

			const q = query(db_notes, where("state", "==", "CA"));

			const unsubscribe = onSnapshot(q, (querySnapshot) => {
				console.log(" querySnapshot ", querySnapshot.docs)
				querySnapshot.docs.forEach((doc) => {
					console.log(" doc ", doc.data());
				});
			});

			return () => {
				unsubscribe();
			};

		}
	}, []);

	return (
		<div>
			<img src={`/assets/images/CNBx-Logo.svg`} />
			<div>aaa</div>
			<button onClick={handleAddNote}>Save Note</button>
		</div>
	);
}
