<footer class="footer-bar">
    <div class="footer-content">
        <p class="footer-copy">&copy; 2025 Glory Gold. Semua Hak Dilindungi.</p>
        <div class="footer-social">
            @php
                // Default: semua link mengarah ke homepage Glory Gold
                $websiteUrl = url('/');
                
                // Ganti URL berikut dengan URL media sosial yang SEBENARNYA ketika sudah ada akun
                $facebookUrl = $websiteUrl; // Ganti dengan URL Facebook ketika sudah ada
                $twitterUrl = $websiteUrl;  // Ganti dengan URL Twitter ketika sudah ada
                $instagramUrl = "https://www.instagram.com/lightgroup_id/"; // Ganti dengan URL Instagram ketika sudah ada
                $linkedinUrl = $websiteUrl;  // Ganti dengan URL LinkedIn ketika sudah ada
                $youtubeUrl = $websiteUrl;   // Ganti dengan URL YouTube ketika sudah ada
            @endphp

            <!-- Facebook -->
            <a href="{{ $facebookUrl }}" 
               @if($facebookUrl !== $websiteUrl) target="_blank" rel="noopener noreferrer" @endif
               onclick="@if($facebookUrl === $websiteUrl) return true; @endif">
                <i class="fab fa-facebook-f"></i>
            </a>
            
            <!-- Twitter -->
            <a href="{{ $twitterUrl }}" 
               @if($twitterUrl !== $websiteUrl) target="_blank" rel="noopener noreferrer" @endif
               onclick="@if($twitterUrl === $websiteUrl) return true; @endif">
                <i class="fab fa-twitter"></i>
            </a>
            
            <!-- Instagram -->
            <a href="{{ $instagramUrl }}" 
               @if($instagramUrl !== $websiteUrl) target="_blank" rel="noopener noreferrer" @endif
               onclick="@if($instagramUrl === $websiteUrl)return true; @endif">
                <i class="fab fa-instagram"></i>
            </a>
            
            <!-- LinkedIn -->
            <a href="{{ $linkedinUrl }}" 
               @if($linkedinUrl !== $websiteUrl) target="_blank" rel="noopener noreferrer" @endif
               onclick="@if($linkedinUrl === $websiteUrl) return true; @endif">
                <i class="fab fa-linkedin-in"></i>
            </a>
            
            <!-- YouTube -->
            <a href="{{ $youtubeUrl }}" 
               @if($youtubeUrl !== $websiteUrl) target="_blank" rel="noopener noreferrer" @endif
               onclick="@if($youtubeUrl === $websiteUrl) return true; @endif">
                <i class="fab fa-youtube"></i>
            </a>
        </div>
    </div>
</footer>