<div class="blocbourse2 Container80 TexAlCenter"
    style="height:30px;width:63%;border-bottom: 0.2px solid #918e8e;background-color: #f0b042c4; overflow:hidden; position:relative;">

    <div class="news-ticker" id="newsTicker"
        style="white-space: nowrap; display: inline-block; position:absolute; left:100%;">


        @foreach ($actualites as $info)
            <span style="font-size:12px; font-weight: normal; color:#f0eded; padding-right:50px;">
                <a href="{{ $info['lien'] }}" target="_blank" style="color:#f0eded; text-decoration:none;">
                    {{ $info['titre'] }}
                </a>
            </span>
        @endforeach
        
    </div>
</div>

<script>
    const ticker = document.getElementById('newsTicker');
    let pos = ticker.offsetLeft;
    const speed = 1; // pixels par frame

    function animateTicker() {
        pos -= speed;
        if (pos < -ticker.offsetWidth) {
            pos = ticker.parentElement.offsetWidth;
        }
        ticker.style.left = pos + 'px';
        requestAnimationFrame(animateTicker);
    }
    animateTicker();
</script>
