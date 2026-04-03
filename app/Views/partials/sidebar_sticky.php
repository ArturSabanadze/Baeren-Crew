<div class="sb_wrapper">
    <!-- toggle arrow container -->
    <div class="sb_arrow">
        <div class="sb_toggle_arrow">
            <svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.2506 0.371326L0.734853 9.85386L11.2182 19.8713" stroke="white" stroke-width="2"
                    stroke-linejoin="round" />
            </svg>
        </div>
    </div>
    <div class="sb_outer_container">

        <!-- element container -->
        <div class="sb_inner_container">
            <div class="sb_elements">
                <!-- contact element -->
                <div class="sb_item">
                    <a href="#section-hero">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.4444 12.8889C15.3 12.8889 16.5 12.3556 16.5 11.5V7.5V3.55556C16.5 2.7 15.3 2 14.4444 2H3.55556C2.7 2 2 2.7 2 3.55556V16L5.11111 12.8889H14.4444Z"
                                stroke="white" stroke-width="1.5" stroke-linejoin="round" />
                            <path d="M4 3.9H3.9V4.1H4V4V3.9ZM4 4V4.1H7V4V3.9H4V4Z" fill="#7E7E7E" />
                            <path d="M4 9.9H3.9V10.1H4V10V9.9ZM4 10V10.1H8V10V9.9H4V10Z" fill="#7E7E7E" />
                            <path d="M4 10.9H3.9V11.1H4V11V10.9ZM4 11V11.1H9V11V10.9H4V11Z" fill="#7E7E7E" />
                            <path d="M10 6.4H9.9V6.6H10V6.5V6.4ZM10 6.5V6.6H14.5V6.5V6.4H10V6.5Z" fill="#7E7E7E" />
                            <path d="M10 7.9H9.9V8.1H10V8V7.9ZM10 8V8.1H15V8V7.9H10V8Z" fill="#7E7E7E" />
                        </svg>
                    </a>


                </div>
                <!-- calculator element -->
                <div class="sb_item">
                    <a href="#rechner">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.75 2.25H5.25C4.42157 2.25 3.75 2.92157 3.75 3.75V14.25C3.75 15.0784 4.42157 15.75 5.25 15.75H12.75C13.5784 15.75 14.25 15.0784 14.25 14.25V3.75C14.25 2.92157 13.5784 2.25 12.75 2.25Z"
                                stroke="white" stroke-width="1.5" />
                            <path d="M6 8H7.5ZM9 8H10H10.5M12 8V8.01ZM6 10H7.49813ZM8.99625 10H10.4944ZM11.9925 10H12Z"
                                fill="white" />
                            <path d="M6 8H7.5M9 8H10H10.5M12 8V8.01M6 10H7.49813M8.99625 10H10.4944M11.9925 10H12"
                                stroke="white" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M6 12H7.5" stroke="white" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M9 12H10.5" stroke="white" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M12 12V12.01" stroke="white" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M6 5H12" stroke="white" stroke-width="2" stroke-linecap="square" />
                        </svg>
                    </a>

                </div>
                <!-- whatsapp element -->
                <div class="sb_item">

                    <?php
                    $phone = "+4915561231466";
                    $message = urlencode("Hallo, ich brauche Unterstützung bei meinem Umzug. Können Sie mir bitte weitere Informationen zu Ihren Dienstleistungen und Preisen geben? Vielen Dank!");
                    $link = "https://wa.me/$phone?text=$message";
                    echo "<a href='$link' target='_blank'><svg width=\"18\" height=\"18\" viewBox=\"0 0 18 18\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                        <path
                            d=\"M15 9C15 12.3 12.3 15 9 15C7.95 15 6.975 14.775 6.075 14.25L3 15L3.825 12.15C3.3 11.25 3 10.2 3 9C3 5.7 5.7 3 9 3C12.3 3 15 5.7 15 9Z\"
                            stroke=\"white\" stroke-width=\"1.5\" stroke-linejoin=\"round\" />
                        <path
                            d=\"M9 7C11 6.5 8.5 6 8.28332 6.12683C8.28332 6.12683 7.24687 6.05688 6.65519 7.11034C5.50857 8.67305 7 11.5 8.5 12C8.5 12 9.5 12.5 10.5 12C11.5 11.5 12 9.5 10.5 10.5\"
                            stroke=\"white\" stroke-width=\"1.5\" stroke-linecap=\"round\" stroke-linejoin=\"round\" />
                    </svg></a>";
                    ?>

                </div>
            </div>
        </div>


    </div>
</div>