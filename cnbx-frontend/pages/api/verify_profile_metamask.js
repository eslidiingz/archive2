export default async function handler(req, res) {
  if (req.method !== "POST") {
    res.status(500).json({
      response: "Not Allow Method",
      data: null,
    });
  }

  try {
    const { access_token, phone_number, otp_ref, otp_number } = req.body;
    const response = await fetch(
      `${process.env.NEXT_PUBLIC_JNFT_API_URL}/account/sign-verify`,
      {
        method: "POST",
        headers: {
          "X-API-KEY": `${process.env.NEXT_PUBLIC_JNFT_API_KEY}`,
          "Content-Type": "application/json",
          Authorization: `Bearer ${access_token}`,
        },
        body: JSON.stringify({
          phone_number,
          otp_ref,
          otp_number,
        }),
      }
    );
    const data = await response.json();

    console.log(data);

    res.status(data?.statusCode).json({
      response: "Verify Profile With Metamask success",
      data: data?.response?.data,
    });
  } catch (error) {
    // console.log(error);
    res.status(500).json({
      response: error,
      data: null,
    });
  }
}
