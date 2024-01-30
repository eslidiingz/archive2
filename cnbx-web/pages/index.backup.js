
// FIREBASE
import { collection, addDoc, getDocs } from "firebase/firestore";
import { useCollection } from 'react-firebase-hooks/firestore';
import { app, firestore } from "/configs/config.firebase";
if (firestore) var dbInstance = collection(firestore, "notes");

// NEXT
import { useEffect, useState } from "react";
import Image from "next/image";

export default function Home() {

	const [text, setText] = useState("")

	const saveNote = () => {
		console.log(dbInstance)
		addDoc(dbInstance, {
			noteTitle: "noteTitle",
			noteDesc: "noteDesc",
		}).then(() => {
			console.log("Ola")
		});
	};

	const getNotes = () => {
		getDocs(dbInstance).then((data) => {
			data.docs.map((item) => {
				console.log("item.id", item.id)
				return { ...item.data(), id: item.id };
			})
		});
	};

	useEffect(() => {
        getNotes();
    }, [])

	return (
		<div>
			<Image src="/assets/images/CNBx-Logo.svg" width="200px" height="200px" />
			<img src={`/assets/images/CNBx-Logo.svg`}/>
			<div>aaa</div>
			<button onClick={saveNote}>Save Note</button>
		</div>
	);
}
