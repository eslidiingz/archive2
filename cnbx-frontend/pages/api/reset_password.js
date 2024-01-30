export default async function handler(req, res) {
  if (req.method !== "POST") {
    res.status(500).json({
      response: "Not Allow Method",
      data: null,
    });
  }
  try {
    const reqData = req.body;
    const response = await fetch(
      `${process.env.REST_API}/account/reset-password`,
      {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-API-KEY": process.env.REST_API_KEY,
        },
        body: JSON.stringify(reqData),
      }
    );
    const responseData = await response.json();
    if (responseData.statusCode === 201) {
      res.status(201).json({ status: true, data: responseData });
    } else {
      res.status(500).json({ status: false, data: null });
    }
  } catch {
    res.status(500).json({ status: false, data: null });
  }
}
