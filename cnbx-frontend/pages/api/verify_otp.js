/** @format */

export default async function handler(req, res) {
	if (req.method !== "POST") {
		res.status(500).json({
			response: "Not Allow Method",
			data: null,
		});
	}

	try {

		const response = await fetch(`${process.env.NEXT_PUBLIC_JNFT_API_URL}/account/verify`, {
			method: "POST",
			headers: {
				"Content-Type": "application/json",
				"X-API-KEY": process.env.NEXT_PUBLIC_JNFT_API_KEY,
			},
			body: JSON.stringify(req.body),
		});

		const responseData = await response.json();

		res.status(200).json({ status: responseData?.statusCode === 201 ? true : false, body: req.body ,re: responseData});
	} catch {
		res.status(200).json({ status: false });
	}
}
