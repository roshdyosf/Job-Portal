<span class="text-sm font-semibold text-slate-200">{{ $label }}</span>
<textarea name={{ $name ?? "description" }} rows="6"
    placeholder="{{ $placeholder ?? "Describe the role, responsibilities, and qualifications." }}"
    class="w-full rounded-[1.75rem] border border-slate-700 bg-slate-900/90 px-4 py-4 text-slate-100 placeholder:text-slate-500 shadow-inner shadow-black/20 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/25"></textarea>