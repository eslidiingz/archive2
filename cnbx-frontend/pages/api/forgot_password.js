export default async function handler(req, res) {
    if (req.method !== "POST") {
        res.status(500).json({
          response: "Not Allow Method",
          data: null,
        });
    }
    try {
        const { phone_number, citizen_number}  = req.body;
        console.log(phone_number, citizen_number)
        const reqData = {
            phone_number: `${phone_number}`,
            citizen_number: `${citizen_number}`
        };
        const response = await fetch(
            `${process.env.REST_API}/account/forgot-password`,
            {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-API-KEY": process.env.REST_API_KEY
                },
                body: JSON.stringify(reqData)
            }
        );
        const responseData = await response.json();
        console.log(responseData);
        res.status(201).json({status: true, data: responseData});
    } catch {
        res.status(500).json({status: false, data: null});
    }
}