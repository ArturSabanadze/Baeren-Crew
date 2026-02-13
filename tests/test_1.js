function addUpTo (upTo) {
    return Range(1, upTo + 1).reduce((a, b) => a + b, 0);
}


console.log(addUpTo(5)); // 15