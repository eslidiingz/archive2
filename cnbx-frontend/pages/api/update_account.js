/** @format */

export default async function handler(req, res) {
	if (req.method !== "POST") {
		res.status(500).json({
			response: "Not Allow Method",
			data: null,
		});
	}

	try {
		const { access_token, ...otherProps } = req.body;

		const response = await fetch(`${process.env.NEXT_PUBLIC_JNFT_API_URL}/account/update-profile`, {
			method: "POST",
			headers: {
				"Content-Type": "application/json",
				"X-API-KEY": process.env.NEXT_PUBLIC_JNFT_API_KEY,
				authorization: `Bearer ${access_token}`,
			},
			body: JSON.stringify(otherProps),
		});

		const responseData = await response.json();

		res.status(200).json({ status: true, data: responseData?.response?.data });
	} catch {
		res.status(200).json({ status: false, data: null });
	}
}
