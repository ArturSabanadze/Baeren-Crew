function isMobileDevice() {
  return /Android|iPhone|iPad|iPod|Opera Mini|IEMobile|WPDesktop/i.test(
    navigator.userAgent
  );
}

if (isMobileDevice()) {
  console.log("User is on a mobile device");
} else {
  console.log("User is on desktop");
}
