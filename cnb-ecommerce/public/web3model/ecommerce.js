const smartContractToken = async (providerType = false) => {
    const abi = (await $.getJSON(`/abis/${app}/mbusdToken.json`)) || [];
    return smartContact(Config.MBUSD_ADDR, abi, providerType);
};

const smartContractEcom = async (providerType = false) => {
    const abi = (await $.getJSON(`/abis/${app}/cbnecommerce.json`)) || [];
    return smartContact(Config.CNB_ECOMMERCE_ADDR, abi, providerType);
};

const buyItem = async (
    orderId = 0,
    amount = null,
    tokenAddress = null,
    seller = null
) => {
    let res = false;
    try {
        console.log(orderId, amount, tokenAddress, seller)
        /** Check dApp before action anything */
        if (await dAppChecked()) {
            const sc = await smartContractEcom();
            const tx = await sc.buy(orderId, amount, tokenAddress, seller);
            const txwait = await tx.wait(5);
            if (txwait) {
                return txwait.transactionHash;
            }

            if (debug) {
                console.log(
                    `%c===== buy(orderId, amount, tokenAddress, seller) CA: ${
                        Config.CNB_ECOMMERCE_ADDR
                    } [${[orderId, amount, tokenAddress, seller]}] =====>`,
                    "color: skyblue",
                    `${res}`
                );
            }
        } /** End check dApp */
    } catch (e){
        console.error(e)
    }

    return res;
};

const callTransferToSeller = async (orderId = [], totalAmount = 0) => {
    let res = false;

    if (await dAppChecked()) {
        const sc = await smartContractEcom();
        const tx = await sc.transferToSeller(orderId, totalAmount);
        const txwait = tx.wait(5);

        if (txwait) res = true;
    }

    return res;
};

const callRefund = async (orderId = null) => {
    let res = false;

    if (await dAppChecked()) {
        const sc = await smartContractEcom();
        const tx = await sc.refund(orderId);
        const txwait = tx.wait(5);

        if (txwait) res = true;
    }

    return res;
};

const getFeeRate = async () => {
    const sc = await smartContractEcom();
    const tx = await sc.feeRate();

    return tx;
};

const allowanceToken = async (operator) => {
    try {
        const owner = await getWallet();
        const contract = await smartContractToken();

        const allowance = ethers.utils.formatEther(
            await contract.allowance(owner, operator)
        );

        return parseFloat(allowance) > 0;
    } catch {
        return false;
    }
};

const approveToken = async (address) => {
    try {
        const owner = await getWallet();

        if ((await dAppChecked()) === false) {
            Swal.fire(
                "Warning",
                "Please, Install metamark extension to connect DApp",
                "warning"
            );
        }

        if (typeof owner === "undefined") {
            Swal.fire(
                "Warning",
                "Please, Connect metamark to the DApp",
                "warning"
            );
        }

        const contract = await smartContractToken();
        const tx = await contract.approve(address, unlimitAmount);
        const status = await tx.wait();

        return status;
    } catch {
        return false;
    }
};
