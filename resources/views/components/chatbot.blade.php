{{-- ─────── KrimAI chatbot widget ─────── --}}
<div class="lx-chat" id="lxChat">

    <button type="button" class="lx-chat-fab" id="lxChatFab" aria-haspopup="dialog" aria-expanded="false" aria-controls="lxChatPanel" aria-label="{{ __('chatbot.widget_title') }}">
        <span class="lx-chat-fab-icon lx-chat-logo" aria-hidden="true">
            <video src="{{ asset('img/ai.mp4') }}" autoplay loop muted playsinline></video>
        </span>
        <span class="lx-chat-fab-close" aria-hidden="true">
            <svg width="38" height="38" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
        </span>
    </button>

    <div class="lx-chat-panel" id="lxChatPanel" role="dialog" aria-modal="false" aria-hidden="true" aria-label="{{ __('chatbot.widget_title') }}">
        <div class="lx-chat-header">
            <span class="lx-chat-logo lx-chat-header-logo" aria-hidden="true">
                <video src="{{ asset('img/ai.mp4') }}" autoplay loop muted playsinline></video>
            </span>
            <span class="lx-chat-header-title">{{ __('chatbot.widget_title') }}</span>
            <button type="button" class="lx-chat-close" id="lxChatClose" aria-label="{{ __('lan.yopish') }}">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
            </button>
        </div>

        <div class="lx-chat-messages" id="lxChatMessages"></div>

        <div class="lx-chat-typing" id="lxChatTyping" hidden>
            <span class="lx-chat-logo lx-chat-typing-logo" aria-hidden="true">
                <video src="{{ asset('img/ai.mp4') }}" autoplay loop muted playsinline></video>
            </span>
            <span class="lx-chat-typing-dots"><span></span><span></span><span></span></span>
        </div>

        <form class="lx-chat-input-row" id="lxChatForm" autocomplete="off">
            <input type="text" class="lx-chat-input" id="lxChatInput" placeholder="{{ __('chatbot.placeholder') }}" maxlength="1000" required>
            <button type="submit" class="lx-chat-send" aria-label="{{ __('chatbot.send') }}">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/></svg>
            </button>
        </form>

        <p class="lx-chat-disclaimer">{{ __('chatbot.disclaimer') }}</p>
    </div>
</div>

<script>
(function () {
    var root = document.getElementById('lxChat');
    if (!root) return;

    var fab = document.getElementById('lxChatFab');
    var panel = document.getElementById('lxChatPanel');
    var closeBtn = document.getElementById('lxChatClose');
    var messagesEl = document.getElementById('lxChatMessages');
    var typingEl = document.getElementById('lxChatTyping');
    var form = document.getElementById('lxChatForm');
    var input = document.getElementById('lxChatInput');

    var endpoint = @json(route('chatbot.ask', [], false));
    var csrfToken = document.querySelector('meta[name="csrf-token"]');
    csrfToken = csrfToken ? csrfToken.content : '';

    var welcome = @json(__('chatbot.welcome'));
    var errorGeneric = @json(__('chatbot.error_generic'));

    var history = [];
    var isOpen = false;
    var isSending = false;
    var welcomed = false;

    function escapeHtml(str) {
        var div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }

    function formatBotText(text) {
        var safe = escapeHtml(text);
        safe = safe.replace(/\*\*(.+?)\*\*/g, '<strong>$1</strong>');
        safe = safe.replace(/^- (.+)$/gm, '• $1');
        safe = safe.replace(/\n/g, '<br>');
        return safe;
    }

    function scrollToBottom() {
        messagesEl.scrollTop = messagesEl.scrollHeight;
    }

    function addMessage(role, text) {
        var row = document.createElement('div');
        row.className = 'lx-chat-msg ' + (role === 'user' ? 'is-user' : 'is-bot');

        var bubble = document.createElement('div');
        bubble.className = 'lx-chat-bubble';
        if (role === 'user') {
            bubble.textContent = text;
        } else {
            bubble.innerHTML = formatBotText(text);
        }

        row.appendChild(bubble);
        messagesEl.appendChild(row);
        scrollToBottom();
    }

    function openPanel() {
        isOpen = true;
        root.classList.add('is-open');
        panel.setAttribute('aria-hidden', 'false');
        fab.setAttribute('aria-expanded', 'true');
        document.body.classList.add('lx-chat-open');

        if (!welcomed) {
            welcomed = true;
            addMessage('model', welcome);
        }

        setTimeout(function () { input.focus(); }, 260);
    }

    function closePanel() {
        isOpen = false;
        root.classList.remove('is-open');
        panel.setAttribute('aria-hidden', 'true');
        fab.setAttribute('aria-expanded', 'false');
        document.body.classList.remove('lx-chat-open');
    }

    fab.addEventListener('click', function () {
        if (isOpen) { closePanel(); } else { openPanel(); }
    });
    closeBtn.addEventListener('click', closePanel);

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && isOpen) closePanel();
    });

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        if (isSending) return;

        var message = input.value.trim();
        if (!message) return;

        addMessage('user', message);
        input.value = '';
        isSending = true;
        typingEl.hidden = false;
        scrollToBottom();

        fetch(endpoint, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ message: message, history: history })
        })
        .then(function (res) { return res.json().then(function (data) { return { ok: res.ok, data: data }; }); })
        .then(function (result) {
            typingEl.hidden = true;
            isSending = false;

            if (!result.ok || !result.data.reply) {
                addMessage('model', (result.data && result.data.error) ? result.data.error : errorGeneric);
                return;
            }

            addMessage('model', result.data.reply);

            history.push({ role: 'user', text: message });
            history.push({ role: 'model', text: result.data.reply });
            if (history.length > 12) history = history.slice(history.length - 12);
        })
        .catch(function () {
            typingEl.hidden = true;
            isSending = false;
            addMessage('model', errorGeneric);
        });
    });
})();
</script>
