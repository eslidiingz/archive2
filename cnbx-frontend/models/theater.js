import { onSnapshot, collection, query, where, doc, setDoc, getDocs, writeBatch } from "firebase/firestore";
import { app, analytics, firestore } from "/db/firebase";

const collection_name = "notes"

const methods = {
	async gets() {
		const q = query(collection(firestore, collection_name));
		const res = await getDocs(q);
		const result = await Promise.all(res.docs.map(async (item, index) => {
			return item.data()
		}))
		return result;
	},
	async get(id) {
		const q = query(collection(firestore, collection_name), where("id", "==", "5naaCfekBBqlLk2FBvWz"));
		const res = await getDocs(q);
		return res.docs;
	},
	async insert(data) {
		const q = query(collection(firestore, collection_name), where("state", "==", "CA"));
		const querySnapshot = await getDocs(q);
		return querySnapshot.docs;
	},
	// async insertMany(data) {
	// 	const batch = writeBatch(firestore);
	// },
};

export default methods;
