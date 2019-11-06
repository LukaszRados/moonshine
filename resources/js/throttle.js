const throttle = (fn, threshold = parseInt(1000 / 50)) => {
    let lastCall;
    let timeout;

    return function () {
        const context = this;
        const args = arguments;
        const now = +new Date();

        if (lastCall && now < lastCall + threshold) {
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                lastCall = now;
                fn.apply(context, args);
            }, threshold);
        } else {
            lastCall = now;
            fn.apply(context, args);
        }
    };
};

export default throttle;
