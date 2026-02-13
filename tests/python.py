def addUpTo(n):
    return sum(range(1, n + 1))

def addUpToByStep(upTo, byStep):
    return sum(range(1, upTo + 1, byStep))

print(addUpTo(5))
