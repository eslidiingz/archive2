/** @format */

export default async function handler(req, res) {
	if (req.method !== "POST") {
		res.status(500).json({
			response: "Not Allow Method",
			data: null,
		});
	}

	try {
		const registerInfo = req.body;
		const response = await fetch(`${process.env.NEXT_PUBLIC_JNFT_API_URL}/account/register`, {
			method: "POST",
			headers: {
				"Content-Type": "application/json",
				"X-API-KEY": process.env.NEXT_PUBLIC_JNFT_API_KEY,
			},
			body: JSON.stringify(registerInfo),
		});

		const responseData = await response.json();

		const otpRef = responseData?.response?.data?.otp_ref;

		res.status(200).json({
			status: responseData.statusCode !== 201 ? false : true,
			data: {
				otpRef,
			},
			resp: responseData
		});
	} catch (e) {
		res.status(200).json({
			status: false,
			data: {
				otpRef: null,
			},
		});
	}
}
