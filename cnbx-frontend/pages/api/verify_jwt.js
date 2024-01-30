/** @format */

export default async function handler(req, res) {
	if (req.method !== "GET") {
		res.status(500).json({
			response: "Not Allow Method",
			data: null,
		});
	}

	try {
		const { access_token } = req.body;

		const response = await fetch(`${process.env.NEXT_PUBLIC_JNFT_API_URL}/account/jwt`, {
			method: "GET",
			headers: {
				"Content-Type": "application/json",
				"X-API-KEY": process.env.NEXT_PUBLIC_JNFT_API_KEY,
				authorization: `Bearer ${access_token}`,
			},
		});

		const responseData = await response.json();

		res.status(200).json({
			status: responseData?.statusCode === 201 ? true : false,
			data: { user: responseData?.response?.data?.id },
		});
	} catch {
		res.status(200).json({ status: false, data: { user: null } });
	}
}
