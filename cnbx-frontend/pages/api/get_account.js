export default async function handler(req, res) {
  if (req.method !== "POST") {
    res.status(500).json({
      response: "Not Allow Method",
      data: null,
    });
  }

  try {
    const { phone_number, citizen_number } = req.body;
    const response = await fetch(
      `${process.env.NEXT_PUBLIC_JNFT_API_URL}/account/get-account`,
      {
        method: "POST",
        headers: {
          "X-API-KEY": `${process.env.NEXT_PUBLIC_JNFT_API_KEY}`,
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ phone_number, citizen_number }),
      }
    );

    const data = await response.json();

    res.status(data?.statusCode).json({
      response: "get username success",
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
