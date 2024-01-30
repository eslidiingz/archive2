export default async function handler(req, res) {
  if (req.method !== "POST") {
    res.status(500).json({
      response: "Not Allow Method",
      data: null,
    });
  }

  try {
    const { access_token, redeem_code } = req.body;
    const response = await fetch(
      `${process.env.NEXT_PUBLIC_JNFT_API_URL}/redeem/user-redeem`,
      {
        method: "POST",
        headers: {
          "X-API-KEY": `${process.env.NEXT_PUBLIC_JNFT_API_KEY}`,
          "Content-Type": "application/json",
          Authorization: `Bearer ${access_token}`,
        },
        body: JSON.stringify({ redeem_code }),
      }
    );

    const data = await response.json();

    res.status(data?.statusCode).json({
      response: "Redeem success",
      data: data,
    });
  } catch (error) {
    // console.log(error);
    res.status(500).json({
      response: error,
      data: null,
    });
  }
}
